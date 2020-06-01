<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $primaryKey = 'ruangan_id';
    protected $fillable = ['Film_id', 'ruangan_capacity'];
}
