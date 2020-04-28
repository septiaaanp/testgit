<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chart extends Model
{
    protected $table = "chart";
    protected $fillable = ['country','month','rainfall'];
}
