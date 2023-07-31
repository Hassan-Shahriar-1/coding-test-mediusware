<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        if (auth()->user()) {
            return redirect('dashboard');
        } else {
            return redirect('/login-page');
        }
    }
}
