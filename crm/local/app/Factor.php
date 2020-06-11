<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    protected $table = 'factor';
    protected $fillable = [
        'facId',
        'shbId',
        'amount',
        'facDate',
        'facTime',
    ];
}
