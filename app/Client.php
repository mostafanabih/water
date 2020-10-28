<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    protected $guarded = ['id'];

    use Notifiable;

    public function Order(){
        return $this->hasMany(Order::class);
    }
}
