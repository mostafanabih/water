<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = ['id'];

    public function Company(){
        return $this->belongsTo(Company::class);
    }
}
