<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{

    public function create()
    {
        return view('register.create');
    }

    public function store() {
        // create user
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);


        $attributes['password'] = bcrypt($attributes['password']);

        User::query()->create($attributes);

        return redirect('/');
    }


}
