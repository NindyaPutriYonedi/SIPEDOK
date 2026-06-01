<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where(
            'username',
            $request->username
        )->first();

        if(!$user)
        {
            return back()
            ->with('error','User tidak ditemukan');
        }

        if(md5($request->password) != $user->password)
{
    return back()
    ->with('error','Password salah');
}

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
