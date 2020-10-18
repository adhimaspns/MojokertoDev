<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class AuthController extends Controller
{
    public function formlogin()
    {
        return view('auths.login');
        // return " anjay";
    }

    public function postlog(Request $request)
    {
        if ( Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect('/home');

            // $user = auth()->user();
            // return $user;
            
        }else{
            return redirect('/form/login')->with('gagal','Username & Password Tidak Sesuai !');
        }

        Auth()->destroy();
            return redirect('log');
    }

    public function signout(Request $request)
    {
        Auth::logout();
        return redirect('/form/login');
    }
}
