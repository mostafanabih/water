<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChooseCompany extends Model
{
    protected $table = 'choose_companies';

    protected $guarded = ['id'];

    public function Company(){
        return $this->belongsTo(Company::class);
    }
}
