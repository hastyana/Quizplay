<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function register(RegisterRequest $request) {
        // $user = User::create($request->validated());
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>$request->password,
            'role' => 'pelajar',
        ]);
        auth()->login($user);
        Session()->flash('alert-success', 'Data berhasil disimpan');
        return redirect('/register');
    }
}
