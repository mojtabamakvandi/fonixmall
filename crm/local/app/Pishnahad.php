<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pishnahad extends Model
{
    protected $table = 'suggestion';
    protected $fillable = [
        'productBuy',
        'productSuggestion',
        'off',
        'group_id',
        'fromDate',
        'toDate',
        'user_id',
        'userId',
        'created_at',
        'updated_at'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'productSuggestion','productId');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
