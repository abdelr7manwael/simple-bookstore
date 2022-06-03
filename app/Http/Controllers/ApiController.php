<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Book;
use App\Models\User;
class ApiController extends Controller
{
    //

    function books(){
        $books = Book::get();
        return response()->json($books);
    }

    function users(){
        $users = User::get();
        return response()->json($users);
    }


    function register(Request $r){

        //validation
        $v = \Validator::make($r->all(),[

            'email'=>'required|email|unique:users,email,|string',
            'password'=>'required|string|min:3|confirmed'
        ]);
        if($v->fails()){
            return response()->json(['Errors' => $v->errors()]);
        }
        $user = new User;
        $user->email = $r->email;
        $user->password = \Hash::make($r->password);
        $user->access_token = \Str::random(64);
        $user->save();

        return response()->json(['acces-token:'=>$user->access_token]);

    }

    function login(Request $r){
        //validation
        $v = \Validator::make($r->all(),[
            'email'=>'required|email|string',
            'password'=>'required'
        ]);
        if($v->fails()){
            return response()->json(['Errors'=> $v->errors()]);
        }

        $cred = array('email'=>$r->email,
                      'password'=>$r->password);

        if(Auth::attempt($cred)){
            if(Auth::user()->access_token == null){
                Auth::user()->access_token = \Str::random(64);
                Auth::user()->save();
            }
            return response()->json(['access_token:'=>Auth::user()->access_token]);
        }
        return response()->json(['Error'=>'Not Valid User']);


    }
}
