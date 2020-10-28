<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityCompany extends Model
{
    protected $guarded = ['id'];

    public function City(){
        return $this->belongsTo(City::class);
    }

    public function Company(){
        return $this->belongsTo(Company::class);
    }

    public function CompanyDates(){
        return $this->belongsTo(CompanyDate::class, 'company_id', 'company_id');
    }
}
