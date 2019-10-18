<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $fillable = [
       'userId', 'title', 'image', 'price','description',
    ];

}
