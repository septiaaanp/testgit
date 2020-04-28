<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tp_content_resource extends Model
{
    protected $table = "tp_content_resource";
    protected $fillable = ['judul', 'id_content_category', 'id_content_type', 'duration', 'file_path', 'file_name', 'hit_count', 'row_status', 'nik_ubah', 'wk_ubah', 'nik_rekam', 'wk_rekam'];

    public function to_category()
	{
		return $this->belongsTo('App\tr_content_category', 'id_content_category');
	}
}


