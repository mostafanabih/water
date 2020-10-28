<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = ['id'];

    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
