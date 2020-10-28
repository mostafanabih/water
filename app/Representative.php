<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Representative extends Authenticatable
{
    protected $guarded = ['id'];

    use Notifiable;

    public function Company(){
        return $this->belongsTo(Company::class);
    }

    public function Order(){
        return $this->hasMany(Order::class);
    }

    public function OrderWithoutCancel()
    {
        return $this->hasMany(Order::class)->where('status', '!=', 'cancel');
    }
}
