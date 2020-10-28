<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class CompanyDate extends Model
{
    protected $guarded = ['id'];

    public function get_days_text_ar(){
        $text = '';
        foreach(explode(',', $this->days) as $day){
            switch ($day) {
                case 'saturday':
                    $text .= 'السبت'.',';break;
                case 'sunday':
                    $text .= 'الاحد'.',';break;
                case 'monday':
                    $text .= 'الاثنين'.',';break;
                case 'tuesday':
                    $text .= 'الثلاثاء'.',';break;
                case 'wednesday':
                    $text .= 'الاربعاء'.',';break;
                case 'thursday':
                    $text .= 'الخميس'.',';break;
                case 'friday':
                    $text .= 'الجمعة'.',';break;
                default:
                    $text .= '---'.',';
            }
        }

        return rtrim($text, ',');
    }

    public function get_days_array_ar(){
        $arr = [];
        foreach(explode(',', $this->days) as $day){
            switch ($day) {
                case 'saturday':
                    $arr[] = 'السبت';break;
                case 'sunday':
                    $arr[] = 'الاحد';break;
                case 'monday':
                    $arr[] = 'الاثنين';break;
                case 'tuesday':
                    $arr[] = 'الثلاثاء';break;
                case 'wednesday':
                    $arr[] = 'الاربعاء';break;
                case 'thursday':
                    $arr[] = 'الخميس';break;
                case 'friday':
                    $arr[] = 'الجمعة';break;
                default:
                    $arr[] = '---';
            }
        }

        return $arr;
    }

    public function get_times_array(){
        $arr = [];
        $from_time = strtotime($this->from_time);
        $to_time = strtotime($this->to_time);

        for($i=$from_time;$i<=$to_time;$i+=3600){
            $arr[] = date('h:i a', $i);
        }

        return $arr;
    }
}
