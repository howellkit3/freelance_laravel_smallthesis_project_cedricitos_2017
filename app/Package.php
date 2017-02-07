<?php

namespace Cedricitos;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	protected $table = 'packages';
    protected $fillable = [
        'name','food','price_per_pax','minimum','status',
    ];
}
