<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        //validate
        $fields = $request->validate([
            'first_name'=>['required','max:100'],
            'last_name'=>['required','max:100'],
            'user_name' => ['required','max:100'],
            'email' => ['required','max:100','email','unique:users'],
            'birthday' => ['required'],
            'password' => ['required','confirmed'],
        ]);
        //register
        $user = User::create($fields);
        //login 
        Auth::login($user);
        //redirect
        return redirect()->route('home');
    }
    //login user
    public function login(Request $request) {
        $fields = $request->validate([
            'email' => ['required','max:100','email'],
            'password' => ['required'],
        ]);
        //try login
        if(Auth::attempt($fields,$request->remember)){
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'failed' => 'wrong email or password',
            ]);
        }
    }
    //login for admin
    public function admin_login(Request $request) {
        $fields = $request->validate([
            'email' => ['required','max:100','email'],
            'password' => ['required'],
        ]);
        //try login
        if(Auth::attempt($fields,$request->remember)){
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'wrong email or password',
            ]);
        }
    }
    //logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
