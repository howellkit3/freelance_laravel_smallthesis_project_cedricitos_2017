<?php

namespace Cedricitos;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name', 'category_id', 'price', 'last_name', 'status'
    ];
}
