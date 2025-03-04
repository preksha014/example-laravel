<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredUserController extends Controller
{
    //
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        //validate user
        $attributes=request()->validate([
            'name'=>['required','string'],
            'email'=>['required','email'],
            'password'=>['required',Password::min(6),'confirmed'], //password_conformation
        ]);
        //create user
        $user = User::create($attributes);
        //login user
        Auth::login($user);
        //redirect
        return redirect('/jobs');
    }
}

