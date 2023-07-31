<?php

namespace App\Services;

use App\Models\Transections;
use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class TransectionService
{
    /**
     * storing deposite data
     * @param array $depositeRequestData
     * @return object
     */
    public static function storeDeposite(array $depositeRequestData): object
    {
        $user = auth()->user();

        $depositeRequestData['amount'] = floatval($depositeRequestData['amount']);
        $depositeRequestData['user_id'] = $user->id;
        $depositeRequestData['transection_type'] = 'deposite';
        $depositeRequestData['date'] = date('Y-m-d H:i:s');

        $transection = Transections::create($depositeRequestData);

        ///update profile balance
        $newBalance = $user->balance + $depositeRequestData['amount'];
        self::updateProfileBalance($user->id, $newBalance);

        return $transection;
    }

    /**
     * updating new balance on deposite 
     * @param int $userId
     * @param float $newBalance
     * @return void
     */
    protected static function updateProfileBalance(int $userId, float $newBalance): void
    {
        User::where('id', $userId)->update(['balance' => $newBalance]);
    }
}
