<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){}
 
    public function create(){}


    public function store(request $request){}


    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    
 

    public function update($id, request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            
        ]);

        $user = User::findOrFail($id);
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
         
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        $user->update($userData);

        return redirect()->route('user.edit', $user->id)->with('success', 'User updated successfully.');
    }

    


    public function destroy($id){}


}