<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivableRegister extends Model
{
    protected $guarded = ['id'];

    public function Company(){
        return $this->belongsTo(Company::class);
    }

    public function setConvertImgAttribute($value)
    {
        if ($value) {
            $this->deleteConvertImage($this->convert_img);
            $commission_new_name = time().rand(0000,9999).'.'.$value->getClientOriginalExtension();
            $value->move(public_path() . '/commission', $commission_new_name);
            $this->attributes['convert_img'] = $commission_new_name;
        }
    }
    public function deleteConvertImage($name)
    {
        $deletepath = public_path('/commission/'.$name);
        if (file_exists($deletepath) and $name != '') {
            unlink($deletepath);
        }
        return true;
    }

    public function getConvertImgDisplay(){
        if($this->convert_img){
            if (file_exists('public/commission/'.$this->convert_img)) {
                return url('').'/public/commission/'.$this->convert_img;
            }
        }
        return asset('public/no_img.png');
    }


    public function show_payment_way(){
        switch ($this->payment_way) {
            case 'visa':
                return 'تحويل الكترونى';
            case 'bank':
                return 'تحويل بنكى';
            default:
                return null;
        }
    }
}
