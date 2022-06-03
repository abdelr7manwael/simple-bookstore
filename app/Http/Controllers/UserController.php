<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    //register
    function register(){
        return view('users/register');
    }

    //store user
    function store(Request $request){
        //******validation*****

        $user = new User();
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();

        echo $user->password;

    }

    function login(){
        return view('users/login');
    }

    function handlelogin(Request $request){
        //Validation
        //auth
        $cred = array('email'=>$request->email,
                      'password'=>$request->password);
        if(Auth::attempt($cred)){
            return redirect('books/list');
        }else{
            return 'Not Auth';
        }



    }

    function logout(){
        Auth::logout();
        return redirect('/users/login');
    }
}
