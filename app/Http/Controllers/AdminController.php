<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\UploadeImageTrait;

class AdminController extends Controller
{
    use UploadeImageTrait;
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('dashboard.admin.index', compact('admins'));
    }


    public function create()
    {
        return view('dashboard.admin.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
            'role' => 'required|in:admin,user',
            'photo'=>'nullable|string'
        ]);
        $imagePath = $this->uploade_image($request, 'photo', 'users');
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'photo'=> $imagePath,
        ]);

        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('dashboard.admin.show', compact('admin'));
    }


    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('dashboard.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $old_path=$admin->photo;
        $imagePath=$this->uploade_image($request, 'photo', 'users', $old_path);
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'role' => 'required',
        ]);

        if ($imagePath) {
            $validated['photo'] = $imagePath;
        }else{
            $validated['photo'] = $old_path;
        }

        $admin->update($validated);

        return redirect()->route('admin.index');
    }


    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index');
    }
}
