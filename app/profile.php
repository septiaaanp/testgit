<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = "profile";
    protected $fillable = ['id_user','ttl','alamat','email','hp', 'about', 'cv', 'foto'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

}

