<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productId';
    protected $fillable = [
        'productId','active','productPrice','productName','productRegDate','productRegTime','productAdminId','productSubCatId','Description','offer','productBrandId','guarantee'
    ];
}
