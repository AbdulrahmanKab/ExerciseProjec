<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()){
            return redirect()->back();
        }
        return view('auth.login');

    }
    public function loginSubmit(Request $request){

        $creadintial =  $request->validate(['email'=>'required','password'=>'required']);
        if (auth()->attempt($creadintial)){
            if(auth()->user()->user_type =='admin'){
                return redirect()->route('admin.home');
            }elseif (auth()->user()->user_type =='user'){
                return redirect()->route('user.home');
            }
           abort(403);
        }
        else{
            return redirect()->back()->with(['message'=>'Your Credintal doesnt match our records']);
        }
    }
    public function logout(){
        if (auth()->check()){
            auth()->logout();
            return redirect()->route('login');
        }
        return redirect()->intended('/');
    }
}
