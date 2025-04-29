<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponseController implements LoginResponseContract
{
    public function toResponse($request)
    {
        return redirect('/');
    }
}
