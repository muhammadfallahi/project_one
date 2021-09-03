<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){

        return view('auth.login');
    }

    public function login(Request $request){

        if(is_numeric($request->login)) {
            $credentials = $request->validate([
                'login' => ['required'],
                'password' => ['required'],
            ]);
            $phone_number = $request->get('login');
            $password = $request->get('password');

            if (Auth::attempt(compact('phone_number', 'password'))) {
                return redirect()->route('user.index');
            }else{
                return back()
                ->with('message', 'شماره موبایل یا پسورد وارد شده صحیح نیست.');
            }
        }else{
            $credentials = $request->validate([
                'login' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $email = $request->get('login');
            $password = $request->get('password');

            if (Auth::attempt(compact('email', 'password'))) {
                return redirect()->route('user.index');
            }else{
                return back()
                ->with('message', 'ایمیل یا پسورد وارد شده صحیح نیست.');
            }
        }

    }
}
