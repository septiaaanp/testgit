<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    protected $table = "experience";
    protected $fillable = ['perusahaan', 'bulan_masuk', 'tahun_masuk', 'bulan_selesai', 'tahun_selesai', 'sekarang', 'posisi', 'deskripsi'];
}
