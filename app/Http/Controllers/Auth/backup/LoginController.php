<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('index');
        }
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');

    }
    public function logout(){
        Auth::logout();
        \request()->session()->invalidate();
        return redirect('/');
    }
    public function verify($token){
        $user = User::query()->where('email', base64_decode($token))->where('email_verified_at', null)->first();
        if($user){
            $user->update(['email_verified_at'=>Carbon::now()]);
            Auth::login($user);
            \request()->session()->regenerate(); //\request yêu cầu 1 sesion mới
            return redirect()->intended('index');
        }
    }
}
