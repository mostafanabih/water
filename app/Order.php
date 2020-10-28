<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function Representative()
    {
        return $this->belongsTo(Representative::class);
    }

    public function Admin()
    {
        return $this->belongsTo(Admin::class, 'admin_agree_by');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Product()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function getConvertImageDisplay(){
        if($this->convert_image){
            if (file_exists('public/commission/'.$this->convert_image)) {
                return url('').'/public/commission/'.$this->convert_image;
            }
        }
        return asset('public/no_img.png');
    }


    public function get_status()
    {
        switch ($this->status) {
            case 'wait':
                return 'قيد التأكيد';
            case 'process':
                return 'جارى التنفيذ';
            case 'done':
                return 'تم استلام الطلب';
            case 'cancel':
                return 'تم الغاء الطلب';
            default:
                return null;
        }
    }

    public function get_who_cancel()
    {
        switch ($this->who_cancel) {
            case 'client':
                return 'العميل';
            case 'company':
                return 'الشركة';
            case 'representative':
                return 'المندوب';
            case 'admin':
                return 'الادراة';
            default:
                return null;
        }
    }

    public function get_day_ar()
    {
        switch ($this->day) {
            case 'saturday':
                $day = 'السبت';
                break;
            case 'sunday':
                $day = 'الاحد';
                break;
            case 'monday':
                $day = 'الاثنين';
                break;
            case 'tuesday':
                $day = 'الثلاثاء';
                break;
            case 'wednesday':
                $day = 'الاربعاء';
                break;
            case 'thursday':
                $day = 'الخميس';
                break;
            case 'friday':
                $day = 'الجمعة';
                break;
            default:
                $day = null;
        }

        return $day;
    }

    public function get_payment_way()
    {
        switch ($this->payment_way) {
            case 'on_deliver':
                return 'عند الوصول';
            case 'visa':
                return 'دفع الكترونى';
            default:
                return null;
        }
    }

    public function get_commission_payment_way()
    {
        switch ($this->commission_payment) {
            case 'e_payment':
                return 'تحويل الكترونى';
            case 'bank':
                return 'تحويل بنكى';
            default:
                return 'لا يوجد';
        }
    }
}