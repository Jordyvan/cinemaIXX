<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $primaryKey = 'booking_id';
    protected $fillable = ['user_id', 'film_id', 'seat_id','seat'];
}
