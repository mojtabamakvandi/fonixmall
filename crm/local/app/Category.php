<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'catId','catName','catRegDate','catRegTime','catAdminId','catImg','statusList','catMenuId'
    ];
    protected $table = 'category';


}
