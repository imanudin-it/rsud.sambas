<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    // public function index()
    // {
    //     return view('register.index', [
    //         "title" => "Register User",
    //        ]);
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'username' => 'unique:users',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:6|max:255'
    //     ]);

    //     $strEmail = explode('@', $validatedData['email']);

    //     $validatedData['username'] = $strEmail[0];
    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     User::create($validatedData);

    //     return redirect('/login')->with('success', 'Pendaftaran Berhasil. Silahkan Login !');
    // }
}
