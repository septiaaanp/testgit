<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tr_content_category extends Model
{
    protected $table = "tr_content_category";
    protected $fillable = ['nama', 'row_status', 'nik_ubah', 'wk_ubah', 'nik_rekam', 'wk_rekam'];

    public function from_category()
	{
		return $this->hasMany('App\tp_content_resource', 'id_content_category');
	}
}
