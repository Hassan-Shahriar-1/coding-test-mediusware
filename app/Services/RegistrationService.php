<?php

namespace App\Services;

use App\Models\User;

class RegistrationService
{

    /**
     * create user
     * @param array $requestData
     */
    public static function createUser(array $requestData): object
    {
        return User::create($requestData);
    }
}
