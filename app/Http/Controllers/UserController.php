<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Skill;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profile(string $id)
    {
        $user = User::with('resumes', 'user_skill', 'applications')->findOrFail($id);
        if ($user->hasRole('employer')) {
            $jobs = Job::where('created_by', '=', $user->id)->take(2)->get();
            return view('user.profile', compact('user', 'jobs'));
        } else {
            return view('user.profile', compact('user'));
        }
    }
    public function index()
    {
        $users = User::all();
        $employers = User::with('company')->where('role', '=', 'employer')->paginate(5);
        $candidates = User::simplePaginate(5)->where('role', '=', 'candidate');
        return view('admin.tabs.users', compact('users', 'employers', 'candidates'));
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            $user = User::withTrashed()->where('email', $credentials['email'])->first();

            if ($user) {
                if ($user->deleted_at !== null) {
                    if (Auth::check() && $user->id !== auth()->user()->id) {
                        return view('special.deactivated');
                    }
                    return view('special.deactivated', compact('user'));
                }

                if (auth()->attempt($credentials)) {

                    $user = auth()->user();

                    Auth::login($user);

                    $request->session()->regenerate();

                    if ($user->hasRole('employer')) {
                        return redirect()->route('user.profile', $user->id);
                    } elseif ($user->hasRole('candidate')) {
                        return redirect()->route('job.index');
                    } else {
                        return redirect()->route('admin.dashboard');
                    }
                } else {
                    return back()->withErrors(['email' => 'Invalid credentials! Try again.']);
                }
            } else {
                return back()->withErrors(['email' => 'User not found.']);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function showRegister(Request $request)
    {
        $role = $request->query('role');
        return view('auth.register', compact('role'));
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $role = decrypt($request->input('role'));
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
            ]); // Create User

            auth()->login($user); // Login User

            if ($role == "employer") {
                $user->assignRole($role);
                return redirect()->route('employer.profile.setup');
            } elseif ($role == "candidate") {
                $user->assignRole($role);
                return redirect()->route('candidate.profile.setup');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        Cookie::queue(Cookie::forget('remember_token'));
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function settings(string $id)
    {
        $user = User::with('user_skill')->findOrFail($id);
        if (auth()->user()->id != $user->id) {
            abort(403);
        }

        $categories = Category::select('id', 'name')->get();
        $skills = Skill::select('id', 'name')->orderBy('name')->get();
        return view('user.settings', compact('user', 'categories', 'skills'));
    }

    public function passwordUpdate(PasswordUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'password' => bcrypt($request->input('password')),
        ]);

        $message = "Updated Successfully!";
        $messageBody = "Your password has been updated successfully!";

        return back()->with(compact('message', 'messageBody'));
    }

    public function bookmark($id)
    {
        try {
            $user = auth()->user();
            $job = Job::findOrFail($id);

            // Toggle the bookmark status
            $user->bookmarkedJobs()->toggle($job);

            $message = $user->bookmarkedJobs->contains($job)
            ? 'Bookmarked successfully!'
            : 'Unbookmarked successfully!';

            $messageBody = $user->bookmarkedJobs->contains($job)
            ? 'Job bookmarked successfully!'
            : 'Job unbookmarked successfully!';

            return back()->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getBookmarkedItems()
    {
        $user = auth()->user();
        $bookmarkedJobs = $user->bookmarkedJobs()->paginate(9);
        $bookmarkedUsers = $user->bookmarkedUsers()->paginate(8);

        if ($user->hasRole('candidate')) {
            return view('user.bookmarks', compact('user', 'bookmarkedJobs'));
        } elseif ($user->hasRole('employer')) {
            return view('user.bookmarks', compact('user', 'bookmarkedUsers'));
        } else {
            return view('user.bookmarks', compact('user', 'bookmarkedJobs', 'bookmarkedUsers'));
        }

        // return view('candidate.bookmarks', compact('user', 'bookmarkedJobs', 'bookmarkedUsers'));
    }

    public function bookmarkUser($userId)
    {
        try {
            $user = auth()->user();
            $bookmarkedUser = User::findOrFail($userId);

            // Toggle the bookmark status
            $user->bookmarkedUsers()->toggle($bookmarkedUser);

            $message = $user->bookmarkedUsers->contains($bookmarkedUser)
            ? 'Bookmarked successfully!'
            : 'Unbookmarked successfully!';

            $messageBody = $user->bookmarkedUsers->contains($bookmarkedUser)
            ? 'User bookmarked successfully!'
            : 'User unbookmarked successfully!';

            return back()->with(compact('message', 'messageBody'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getBookmarkedUsers()
    {
        $user = auth()->user();
        $bookmarkedUsers = $user->bookmarkedUsers;

        return view('bookmarked_users', compact('bookmarkedUsers'));
    }

    public function deactivate(Request $request, $id)
    {
        $user = auth()->user();
        $password = $request->input('password');
        if (Hash::check($password, $user->password)) {

            $user->delete();

            $message = 'Account Deactivated';
            $messageBody = 'Your account has been deactivated successfully!';

            return redirect()->route('user.login')->with(compact('message', 'messageBody'));
        } else {
            $message = 'Deactivation failed';
            $messageBody = 'You entered the wrong password! Please try again';
            return back()->with(compact('message', 'messageBody'));
        }
    }

    public function deactivatePage()
    {
        return view('special.deactivated');
    }

    public function activate(UserLoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $user = User::withTrashed()->where('email', $credentials['email'])->first();

            if ($user && password_verify($credentials['password'], $user->password)) {
                $user->restore();

                Auth::login($user);

                $request->session()->regenerate();

                $message = "Re-activated!";
                $messageBody = "Your account has been reactivated successfully!";
                if ($user->hasRole('employer')) {
                    return redirect()->route('user.profile', $user->id)->with(compact('message', 'messageBody'));
                } elseif ($user->hasRole('candidate')) {
                    return redirect()->route('job.index')->with(compact('message', 'messageBody'));
                } else {
                    return redirect()->route('admin.dashboard')->with(compact('message', 'messageBody'));
                }
            } else {
                return redirect()->route('deactivated.account')->withErrors(['email' => 'Invalid credentials! Try again.']);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
