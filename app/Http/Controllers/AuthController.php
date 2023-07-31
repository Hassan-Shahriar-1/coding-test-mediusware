<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * registration page view
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * login page view
     */
    public function loginPage()
    {
        return view('auth.login');
    }
}
