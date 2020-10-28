<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function Order(){
        return $this->hasMany(Order::class);
    }

    public function getImgDisplay(){
        if($this->image){
            if (file_exists('public/product/'.$this->image)) {
                return url('').'/public/product/'.$this->image;
            }
        }
        return asset('public/no_img.png');
    }
}
