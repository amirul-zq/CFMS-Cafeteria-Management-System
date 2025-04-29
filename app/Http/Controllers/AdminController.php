<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

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
}
