<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\job;



class EmployeeController extends Controller
{
    public function index(Request $req){

       $username= $req->session()->get('sessionusername');


        $user = user::where('username',$username)
        ->first();
        return view('employee.employeehome')->with('user',$user);
    }

  }
