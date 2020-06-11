<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','minScore','created_at','updated_at','deleted_at'
    ];
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
