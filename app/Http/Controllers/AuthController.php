<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only("email", "password"))) {
            return redirect("/");
        }
        return redirect("/login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
}
