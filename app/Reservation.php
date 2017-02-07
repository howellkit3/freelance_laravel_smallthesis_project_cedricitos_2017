<?php

namespace Cedricitos;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'status', 'event_id', 'event_date_from', 'event_date_from','event_taste_date'
    ];
}
