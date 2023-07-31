<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * register a user
     * @param RegistrationRequest $request
     */
    public function registerUser(RegistrationRequest $request)
    {
        $requestData = $request->validated();
        try {
            $user = RegistrationService::createUser($requestData);
            return redirect('/login');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'something went Wrong');
        }
    }

    /**
     * login a user
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        try {
            if (Auth::attempt($credentials)) {

                return redirect()->intended('/deposite-list');
            } else {

                return redirect()->back()->with('error', 'Invalid credentials.');
            }
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'something went Wrong');
        }
    }
}
