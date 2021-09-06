<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){

        return view('auth.login');
    }

    public function login(Request $request){

        // login with phone number

        if(is_numeric($request->login)) {  
            $credentials = $request->validate([
                'login' => ['required','min:11','max:11'],
                'password' => ['required'],
            ]);
            $phone_number = $request->get('login');
            $password = $request->get('password');

            if (Auth::attempt(compact('phone_number', 'password'))) {
                return redirect()->route('post.index');
            }else{
                return back()
                ->with('alert', 'incorrect phone or password');
            }
        }else{

            // login with email address

            $credentials = $request->validate([  
                'login' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $email = $request->get('login');
            $password = $request->get('password');

            if (Auth::attempt(compact('email', 'password'))) {
                return redirect()->route('post.index');
            }else{
                return back()
                ->with('alert', 'incorrect email or password');
            }
        }

    }

    public function logout(){

       Auth::logout();

       return redirect()->route('auth.showLogin');
    }

    public function showRegister(){

        return view('auth.register');
    }

    public function register(Request $request){

        $validator = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email','unique:users,email'],
            'phone' => ['required', 'unique:users,phone_number','min:11','max:11'],
            'password' => ['required', 'confirmed'],
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('auth.showLogin')->with('message', 'register successfully! please login for access the account');
    }
}
