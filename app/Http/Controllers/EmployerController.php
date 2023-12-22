<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerCreateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('employer.profile', compact('user'));
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

    public function setup()
    {
        return view('employer.setup');
    }

    public function doSetup(EmployerCreateRequest $request)
    {
        try {
            $id = $request->input('id');
            $user = User::find($id);
            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('uploads'), $imageName);
            }
            $user->update([
                'phone' => $request->input('phone'),
                'age' => $request->input('age'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'img' => $imageName ?? null,
            ]);
            return redirect()->route('company.create');
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function profile()
    {
        return view('employer.profile');
    }
}
