<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'subId','subName','subCatId','subRegDate','saubRegTime','subAdminId','subStatusList'
    ];
    protected $table = 'subcategory';
}
