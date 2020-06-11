<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HyperProduct extends Model
{
    protected $fillable = [
        'name',
        'code',
        'barcode',
        'stoke_id',
        'stoke_name',
        'barcode2',
        'category_id',
        'category_name',
        'unit',
        'total_end',
        'td_end',
        'joz_end',
        'last_fi_buy',
        'last_cost_buy',
        'last_fi_ended',
        'last_cost_ended',
        'last_fi_sale',
        'last_cost_sale',
        'fi_cost',
        'fi_low',
        'fi_hi',
        'fi_off_percent',
        'fi_benefit_percent',
        'fi_khales',
        'created_at',
        'updated_at'
    ];
    protected $table = 'hyper_products';
}
