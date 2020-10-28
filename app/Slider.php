<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $guarded = ['id'];

    public function setImageAttribute($value)
    {
        if ($value) {
            $this->deleteImage($this->image);
            $image_new_name = time().$value->getClientOriginalName();
            $value->move(public_path().'/slider', $image_new_name);
            $this->attributes['image'] = $image_new_name;
        }
    }

    public function deleteImage($name)
    {
        $deletepath = public_path('/slider/'.$name);
        if (file_exists($deletepath) and $name != '') {
            unlink($deletepath);
        }
        return true;
    }

    public function getImgDisplay(){
        if($this->image){
            if (file_exists('public/slider/'.$this->image)) {
                return url('').'/public/slider/'.$this->image;
            }
        }
        return asset('public/no_img.png');
    }
}
