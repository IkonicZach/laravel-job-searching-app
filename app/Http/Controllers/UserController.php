<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile()
    {
        return view('user.profile');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $employers = User::with('company')->where('role', '=', 'employer')->paginate(5);
        $candidates = User::simplePaginate(5)->where('role', '=', 'candidate');
        return view('admin.tabs.users', compact('users', 'employers', 'candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return back()->withErrors(['email' => 'Invalid credentials! Try again.']);
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
            // $role = decrypt($request->input('role'));
            // $user = User::create([
            //     'name' => $request->get('name'),
            //     'email' => $request->get('email'),
            //     'password' => bcrypt($request->get('password')),
            //     'role' => $role,
            // ]); // Create User

            // auth()->login($user); // Login User

            // if ($role == "employer") {
            //     return redirect()->route('employer.profile.setup');
            // } elseif ($role == "candidate") {
            //     return redirect('/jobs/listing');
            // } else {
            //     return redirect('/');
            // }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
