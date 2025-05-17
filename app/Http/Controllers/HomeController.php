<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Chefs;

class HomeController extends Controller
{
    public function index()
    {
        $data = food::all();
        $chefInfo = chefs::all();
        return view("home", compact("data", "chefInfo"));



    }

    public function redirects()
    {
        $data = food::all();
        $usertype = Auth::user()->user_type;

        if($usertype == "admin")
        {
            return view ("admin.admin_home");
        }
        else
        {
            return view ('home',compact('data'));
        }


    }
}