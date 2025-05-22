<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Chefs;
use App\Models\Cart;
use App\Models\Order;

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

         $data2 = cart::where('user_id', $id)->get();

         $data = cart::where('user_id',$id)->join('food', 'carts.food_id', '=', 'food.id')->get();

         return view ('showcart',compact('count','data', 'data2'));
    }


    public function remove($id)
    {
        $data = cart::find($id);

        $data->delete();

        return redirect()->back();

    }


   public function orderConfirm(Request $request)
{

    if (!is_array($request->foodName)) {
        return back()->withErrors(['error' => 'No food items submitted.']);
    }

    foreach ($request->foodName as $key => $foodName) {
        $data = new order;
        $data->foodName = $foodName;
        $data->price = $request->price[$key] ?? 0;
        $data->quantity = $request->quantity[$key] ?? 1;
        $data->name = $request->name ?? 'Guest';
        $data->phone = $request->phone ?? 'N/A';
        $data->address = $request->address ?? 'N/A';

        $data->save();
    }

    return redirect()->back()->with('message', 'Order confirmed successfully!');
}


}
