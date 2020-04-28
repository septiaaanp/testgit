<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education_file extends Model
{
	protected $table = "education_files";
    protected $fillable = ['id_education','filename'];

    public function education()
    {
    	return $this->belongsTo('App\education', 'id', 'id_education');
    }

    // protected $table = "education_files";
    // protected $fillable = ['filename'];
}
