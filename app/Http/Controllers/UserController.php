<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $users = User::paginate(2); // 10 users per page
    return view('admin.Users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     // Validation
    $request->validate([
        'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|string'
    ]);
   User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role
    ]);

    return redirect()->route('user.index')->with('status', 'User created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    $user = User::find($id);
        return view('admin.updateUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    // Validation
    $request->validate([
        'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required'
    ]);

    // Update user
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role
    ]);

    return redirect()->route('user.index')->with('status', 'User updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
 
    $user = User::find($id);
    $user->delete();
    return redirect()->route('user.index')->with('status', 'User deleted successfully.');

    }


  public function loginMatch(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('post.index');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('user.login');
}
}