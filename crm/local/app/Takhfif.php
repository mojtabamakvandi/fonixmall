<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Takhfif extends Model
{
    protected $table = 'offers';
    public function product()
    {
        return $this->belongsTo(Product::class,'productId','productId');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
