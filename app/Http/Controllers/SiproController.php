<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tr_content_category;
use App\tp_content_resource;
use DB;

class SiproController extends Controller
{
    public function index()
    { 

      $data = DB::table('tp_content_resource')
       ->join('tr_content_category', 'tp_content_resource.id_content_category', '=', 'tr_content_category.id_content_category')
       ->join('tr_content_type', 'tp_content_resource.id_content_type', '=', 'tr_content_type.id_content_type')
       ->select('tp_content_resource.*', 'tr_content_category.nama_category', 'tr_content_type.nama')
       ->get();
     return view('coba', compact('data'));

    }
}
