<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public static function getTransectionListWithPagination(string $transectionType, int $userId = null): object
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

        $transections->paginate(20);

        return $transections;
    }
}
