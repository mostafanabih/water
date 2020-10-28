<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    protected $guarded = ['id'];

    use Notifiable;

    public function CompanyDates(){
        return $this->hasOne(CompanyDate::class);
    }

    public function Coupon(){
        return $this->hasMany(Coupon::class);
    }

    public function Order()
    {
        return $this->hasMany(Order::class);
    }

    public function OrderWithoutCancel()
    {
        return $this->hasMany(Order::class)->where('status', '!=', 'cancel');
    }

    public function Representatives()
    {
        return $this->hasMany(Representative::class)->where('role', 'representative');
    }

    public function Products(){
        return $this->hasMany(Product::class);
    }

    public function Representative(){
        return $this->hasMany(Representative::class)->where('role', 'representative');
    }

    public function Responsible(){
        return $this->hasOne(Representative::class)->where('role', 'responsible');
    }

    public function CityCompany(){
        return $this->belongsToMany(CityCompany::class, 'city_companies', 'company_id', 'city_id');
    }

    public function Cities(){
        return $this->hasMany(CityCompany::class);
    }

    public function getImgDisplay(){
        if($this->image){
            if (file_exists('public/company/'.$this->image)) {
                return url('').'/public/company/'.$this->image;
            }
        }
        return asset('public/no_img.png');
    }
}
