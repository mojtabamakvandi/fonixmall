<?php

namespace App;

use App\Group;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'userName','userEmail','userPhonenumber','userId','group_id','userPassword'
    ];
    protected $table = 'user';
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }


}
