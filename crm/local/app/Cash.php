<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $table = 'customer_factor';

    protected $fillable = [
        'customer_id',
        'factor_id',
        'amount',
        'offer',
        'buy_date',
        'buy_time',
        'cash_id',
        'created_at',
        'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','userId');
    }
}
