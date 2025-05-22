<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Food;
use \App\Models\Reservation;
use \App\Models\Chefs;
use \App\Models\Order;
use Laravel\Sanctum\Http\Middleware\CheckForAnyScope;


class AdminController extends Controller
{
    public function user()
    {
        $data = user::all();
        return view("admin.users",compact("data"));
    }

    public function deleteUser($id)
    {
        $userInfo = user::find($id);
        $userInfo->delete();
        return redirect()->back();
    }

    public function deleteMenu($id)
    {
        $item = food::find($id);
        $item->delete();
        return redirect()->back();
    }

    public function foodMenu ()
    {
        $data = food::all();
        return view("admin.foodMenu", compact("data"));
    }

    public function updateMenu ($id)
    {
        $data = food::find($id);
        return view("admin.updateMenu", compact("data"));
    }

    public function viewReservation ()
    {
        $data = reservation::all();
        return view("admin.adminReservation", compact("data"));
    }

    public function viewChef ()
    {
        $data = chefs::all();
        return view("admin.adminChef",compact("data"));
    }

     public function updateChef ($id)
    {
        $data = chefs::find($id);
        return view("admin.updateChef", compact("data"));
    }

    public function deleteChef($id)
    {
        $data = chefs::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updateChefInfo (Request $request , $id)
    {
        $data = chefs::find($id);

        $image = $request->image;
        if($image){

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('chef_image',$imageName);

        $data->image = $imageName;

        }

        $data->name = $request->name;

        $data->speciality = $request->speciality;

        $data->signatureDishes = $request->signatureDishes;

        $data->save();

        return redirect()->back();

    }

    public function uploadChefInfo (Request $request)
    {
        $data = new chefs;

        $image = $request->image;

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('chef_image',$imageName);

        $data->image = $imageName;

        $data->name = $request->name;

        $data->speciality = $request->speciality;

        $data->signatureDishes = $request->signatureDishes;

        $data->save();

        return redirect()->back();

    }

     public function update (Request $request, $id)
    {
        $foodInfo = food::find($id);

         $image = $request->image;

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('food_image',$imageName);

        $foodInfo->image = $imageName;

        $foodInfo->title = $request->title;

        $foodInfo->price = $request->price;

        $foodInfo->description = $request->description;

        $foodInfo->save();

        return redirect()->back();
    }




    public function uploadItems (Request $request)
    {
        $foodInfo = new food;

        $image = $request->image;

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('food_image',$imageName);

        $foodInfo->image = $imageName;

        $foodInfo->title = $request->title;

        $foodInfo->price = $request->price;

        $foodInfo->description = $request->description;

        $foodInfo->save();

        return redirect()->back();
    }

    public function reservation (Request $request)
    {
        $data = new reservation;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        $data->guest = $request->guest;

        $data->date = $request->date;

        $data->time = $request->time;

        $data->message = $request->message;

         $data->save();

        return redirect()->back();
    }

    public function orders()
    {

        $data = order::all();
        return view('admin.orders', compact('data'));
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $data = order::where('name', 'Like', '%' . $search . '%')->orWhere('foodName', 'Like', '%' . $search . '%')->get();
        return view('admin.orders', compact('data'));
    }

}
