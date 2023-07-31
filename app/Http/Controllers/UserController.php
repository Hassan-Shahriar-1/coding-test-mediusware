<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        if ($user) {
            $balance = $user->balance;
        } else {
            return redirect('/login-page');
        }
        try {

            return view('pages.transections-list', compact('balance'));
        } catch (Exception $e) {
            abort(500, 'Something went wrong. Please try again later');
        }
    }
}
