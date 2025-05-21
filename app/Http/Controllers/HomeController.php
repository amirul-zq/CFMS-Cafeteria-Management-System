<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $data = food::all();
        $chefInfo = chefs::all();

         $count = 0;

        if (Auth::check()) {
            $user_id = Auth::id();
            $count = cart::where('user_id', $user_id)->count();
        }

        return view("home", compact("data", "chefInfo","count"));



    }

    public function redirects()
    {
        $data = food::all();
        $chefInfo = chefs::all();
        $usertype = Auth::user()->user_type;

        if($usertype == "admin")
        {
            return view ("admin.admin_home");
        }
        else
        {
            $user_id= Auth::id();
            $count = cart::where('user_id',$user_id)->count();

            return view ('home',compact('data','chefInfo', 'count'));
        }


    }


    public function addcart(Request $request)
    {

        if(Auth::id())
        {
            $user_id= Auth::id();

            $foodId = $request->food_id;
            $quantity = $request->quantity;
            $foodName = $request->food_name;

            $cart = new cart;

            $cart->user_id = $user_id;

            $cart->food_id = $foodId;

            $cart->quantity = $quantity;

            $cart->food_name = $foodName;

            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }

    }

    public function showcart(Request $request, $id)
    {
         $count = cart::where('user_id',$id)->count();

         $data = cart::where('user_id',$id)->join('food', 'carts.food_id', '=', 'food.id')->get();

         return view ('showcart',compact('count','data' ));
    }


}