<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Food;

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

}