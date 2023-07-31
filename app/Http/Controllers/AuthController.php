<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\RegistrationService;
use Exception;
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
            return back()->withErrors(['error' => 'someting went wrong']);
        }
    }
}
