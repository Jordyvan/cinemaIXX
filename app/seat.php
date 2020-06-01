<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seat extends Model
{
    protected $primaryKey = 'seat_id';
    protected $fillable = ['seat_avaibility', 'seat_number','seat_rows','seat_columns','ruangan_id'];
}
