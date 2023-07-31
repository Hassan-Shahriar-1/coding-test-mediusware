<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transections extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'transection_type',
        'amount',
        'fee',
        'date'
    ];

    /**
     * get transection list with pagination
     * @param $transectionType
     * @return object
     */
    public static function allTransectionsData(string $transectionType, int $userId = null): object
    {
        $transections = self::query();

        //getting transections by type
        if ($transectionType != 'all') {
            $transections->where('transection_type', $transectionType);
        }

        //gettting user data
        if ($userId) {
            $transections->where('user_id', $userId);
        }

        $transections = $transections->get();

        return $transections;
    }

    /**
     * withdraw profile balance
     * @param array $requestData
     */
    public static function withdrawAccountBalance(array $requestData): string
    {
        $user = auth()->user();

        $freeWithdrawal = false;
        if ($user->account_type === 'individual') {
            // Check if day is friday or not
            if (date('N') === '5') {
                $freeWithdrawal = true;
            }
        }

        $withdrawAmount = $requestData['amount'];

        $withdrawalFee = self::calculateWithdrawRate($user, floatval($withdrawAmount), $freeWithdrawal);

        // Deduct the withdrawal amount and fee from the user's balance
        $newBalance = $user->balance - ($withdrawAmount + $withdrawalFee);

        if ($newBalance > 0) {
            return "Withdrawal successful. Withdrawn: $withdrawAmount, Fee: $withdrawalFee, New Balance: $newBalance";
        } else {
            return 'You dont have sufficent balance for this withdraw please try lower value';
        }

        // Return a response message

    }


    /**
     * calculate fee rate for withrawal
     * @param object $user
     * @param float $amount
     * @param $freewithdrawal
     * @return float
     */
    private static function calculateWithdrawRate(object $user, float $amount, bool $freeWithdrawal)
    {

        $withdrawalFee = 0.0;

        //user withdraw details
        $withdrawDetails = self::getUserWithdrawDetails($user->id);

        // Calculate the withdrawal fee based on the account type 
        $withdrawalFeeRate = ($user->account_type === 'individual') ? 0.015 : 0.025;

        // Decrease the withdrawal fee to 0.015% for Business accounts after a total withdrawal of 50K
        if ($user->account_type === 'buisness') {
            $totalWithdrawal = $withdrawDetails->total_transection_amount ?? 0;
            if ($totalWithdrawal + $amount >= 50000) {
                $withdrawalFeeRate = 0.015;
            }
        }

        // Check if the first 1K withdrawal per transaction is free for Individual accounts
        if ($user->account_type === 'individual' && $amount <= 1000 && $freeWithdrawal) {
            $withdrawalFee = 0.0;
        } else {
            // Calculate the withdrawal fee
            $withdrawalFee = $amount * $withdrawalFeeRate;
        }

        // Check if the first 5K withdrawal each month is free for Individual accounts
        if ($user->account_type === 'individual' && $amount <= 5000) {
            // Keep track of the monthly withdrawal total for Individual accounts
            $monthlyWithdrawalTotal = $withdrawDetails->total_transections_this_month ?? 0;
            if ($monthlyWithdrawalTotal + $amount <= 5000) {
                $withdrawalFee = 0.0;
            } else {
                $withdrawalFee = ($monthlyWithdrawalTotal + $amount - 5000) * $withdrawalFeeRate;
            }
        }



        return $withdrawalFee;
    }


    /**
     * transection calcultions amount
     * @param $userId
     * @return object
     */
    protected static function getUserWithdrawDetails(int $userId): object
    {
        $count = DB::select(DB::raw('
                select
                    (select sum(amount) from transections WHERE transection_type = "withdraw" and user_id = :userId) as total_transection_amount,
                    (select sum(amount) from transections WHERE MONTH(date) = MONTH(CURDATE()) and user_id = :userId and transection_type = "withdraw" ) AS total_transections_this_month

        '), ['userId' => $userId]);

        return $count[0];
    }
}
