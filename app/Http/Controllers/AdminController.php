<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;



class AdminController extends Controller
{
    public function index(Request $req){

       $username= $req->session()->get('sessionusername');


        $user = user::where('username',$username)
        ->first();
        return view('admin.adminhome')->with('user',$user);
    }

    public function users(Request $req){

        $username= $req->session()->get('sessionusername');


         $userinfo = user::all();
         $user = user::where('username',$username)
        ->first();
         return view('admin.users')->with('user',$user)->with('userinfo',$userinfo);
     }


   }
