<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;


class RegisterResponseController implements RegisterResponseContract
{
    public function toResponse($request)
    {
        return redirect('/');
    }
}
