<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    protected $table = "certificate";
    protected $fillable = ['certificate', 'penerbit','bulan_terbit', 'tahun_terbit', 'file'];
}
