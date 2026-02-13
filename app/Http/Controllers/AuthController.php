<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;    
use Session;

class AuthController extends Controller {
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request)
    {
        if($request->username == 'aldmic' && $request->password == '123abc123'){
    
            session(['login' => true]);
    
            // remember login 7 hari
            if($request->remember){
                Cookie::queue('remember_login', true, 10080);
            }
    
            return redirect('/movies')->with('success','Login Berhasil');
        }
    
        return back()->with('error','Login gagal');
    }
    

    public function showLogin() {
        if(session('login')) {
            return redirect('/movies');
        }

        return view('');
    }

    public function logout()
    {
        session()->flush();
        session()->regenerate();
        Cookie::queue(Cookie::forget('remember_login'));
        // Add notification for logout
        Session::flash('notification', 'You have successfully logged out.');
        return redirect('/')->with('success','Logout Berhasil');
    }

}