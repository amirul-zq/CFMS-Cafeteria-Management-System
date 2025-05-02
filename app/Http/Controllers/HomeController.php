<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");

    }

    public function redirects()
    {
        $usertype = Auth::user()->user_type;

        if($usertype == "admin")
        {
            return view ("admin.admin_home");
        }
        else
        {
            return view ('home');
        }


    }
}
