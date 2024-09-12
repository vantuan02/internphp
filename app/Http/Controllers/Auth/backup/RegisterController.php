<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>['required', 'string', 'max:50'],
            'email'=>['required', 'string', 'max:100', 'unique:users'],
            'password'=>['required', 'string', 'min:8', 'confirmed']
        ]);


        $user = User::query()->create($data);
        //mail
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($token, $user->name));
        // Auth::login($user);
        // $request->session()->regenerate();//gen lai token
        return redirect()->intended('/');
    }
}
