<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transections extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transection_type',
        'amount',
        'fee',
        'date'
    ];
}
