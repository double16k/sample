<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable = [
        'user_id',
        'insurance_id',
        'content_id',
        'date',
        'm_number',
        'f_number',
        'amount',
    ];
}
