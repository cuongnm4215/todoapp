<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'text', 'status'
    ];

    protected $hidden = [];
}
