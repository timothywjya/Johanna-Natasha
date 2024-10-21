<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('Johanna-Natasha-Agaatsz');
        }

        return redirect()->back()->withErrors(['error' => 'Invalid username or password']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
