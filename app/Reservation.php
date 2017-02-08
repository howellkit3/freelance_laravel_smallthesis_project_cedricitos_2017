<?php

namespace Cedricitos;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	protected $table = 'reservations';
    protected $fillable = [
        'user_id', 'status', 'event_id', 'event_date_from', 'event_date_to', 'food_taste_date',
    ];
}
