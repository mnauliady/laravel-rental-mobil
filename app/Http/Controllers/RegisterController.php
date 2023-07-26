<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        $title = 'Register';
        return view('register', compact('title'));
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'telepon' => 'required|unique:users',
            'sim' => 'required|unique:users',
            'alamat' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        
        // session()->flash('success', 'Registration successful!');

        return redirect('/login')->with('success', 'Registration successful!');
    }

}
