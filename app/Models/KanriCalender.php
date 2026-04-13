<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanriCalender extends Model
{
    //
    protected $casts = [
        'room1' => 'array', // JSONカラムを配列として扱う
    ];

    protected $fillable = [
        'room1',
        'date',
    ];
}
