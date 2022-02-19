<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('user', $request->user)->where('password', sha1($request->passwords))->first();
        if ($user != null) {
            Auth::loginUsingId($user->id);
            return redirect()->route('home');
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
