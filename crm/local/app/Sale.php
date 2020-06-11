<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'baskets_detailes';

    protected $fillable = [
        'SHBid',
        'SHBUserId',
        'SHBRegDate',
        'SHBRegTime',
        'userId',
        'SHBPay',
        'userName',
        'userFamily',
        'userEmail',
        'userPhonenumber',
        'PSHBPrId',
        'PSHBCount',
        'productPrice',
        'productId',
        'productName',
        'facId',
        'amount',
        'facDate',
        'facTime',
        'offer',
    ];
}
