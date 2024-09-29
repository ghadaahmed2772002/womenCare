<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\UploadeImageTrait;

class UserController extends Controller
{
    use UploadeImageTrait;
    //index
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }


    //sign up
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
            'role' => 'required|in:admin,user',
            'photo' => 'nullable|image',
        ]);
        $imagePath = $this->uploade_image($request, 'photo', 'users');


        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'photo' => $imagePath,
        ]);

        return redirect()->route('login');
    }

   // sign in
   public function login(Request $request)
   {

       $validated = $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);

       if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
           return redirect()->route('dashboard');
       }

       return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
   }

   //signout
   public function logout(Request $request)
   {
       Auth::logout();
       return redirect()->route('login');
   }


   public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $old_path=$user->photo;
        $imagePath=$this->uploade_image($request, 'photo', 'users', $old_path);
        $validated =([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'photo'=>$old_path
        ]);

        if ($imagePath) {
            $validated['photo'] = $imagePath;
        }

        $user->update($validated);

        return redirect()->route('user.index');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
