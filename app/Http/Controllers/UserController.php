<?php

namespace App\Http\Controllers;

use App\Models\Transections;
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
            $depositeList = Transections::allTransectionsData('deposite', auth()->id());


            return view('pages.transections-list', compact('balance', 'depositeList'));
        } catch (Exception $e) {
            abort(500, 'Something went wrong. Please try again later');
        }
    }
}
