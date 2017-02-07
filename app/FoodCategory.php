<?php

namespace Cedricitos;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
	protected $table = 'categories';
    protected $fillable = [
        'name'
    ];
}
