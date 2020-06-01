<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    protected $primaryKey = 'film_id';
    protected $fillable = ['film_title', 
                            'film_description', 
                            'film_age',
                            'film_duration_minute',
                            'ruangan_id',
                            'id_image',
                            'trailer_link'
                            ];
}
