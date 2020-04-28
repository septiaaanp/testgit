<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// 
// class education extends Model
// {
//     protected $table = "education";

//     protected $fillable = ['tahun_masuk','tahun_selesai','sekolah','jurusan','deskripsi','file'];
// }
class education extends Model
{
    protected $table = "education";
    protected $fillable = ['tahun_masuk','tahun_selesai','sekolah','jurusan','deskripsi'];

	public function file()
	{
		return $this->hasMany('App\education_file', 'id_education');
	}

	public function from_education()
	{
		return $this->belongsTo('App\User', 'id','id_user');
	}

}
