<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'status', 'avatar', 'description', 'created_at', 'updated_at'];
}

