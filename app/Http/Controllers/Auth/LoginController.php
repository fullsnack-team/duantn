<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credential = $request->only('email', 'password');
            if (auth()->attempt($credential)) {
                $user = auth()->user();
                auth()->login($user, true);
                return response()->json('success');
            } else {
                return response()->json('fail');
            }
        }
        return view('auth.login');
    }
}