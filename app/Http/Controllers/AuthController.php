<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validate = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput();
            }

            $credentials = $validate->validated();

            if (Auth::attempt($credentials)) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->back()->withErrors(['error' => 'The provided credentials do not match our records.'])->withInput();
            }
        }

        return view('auth.login');
    }
}
