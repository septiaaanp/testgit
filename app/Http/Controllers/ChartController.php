<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chart;
use DB;

class ChartController extends Controller
{
    public function index()
    {
    	
    	//select data SELECT SUM(nama coloumn) as count FROM table GROUP BY MONTH(created_at) ORDER BY created_at
        $indonesia = chart::select(DB::raw("SUM(rainfall) as count"))->where('country', 'indonesia')
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get()->toArray(); //dibelakang ditambahin array karna data dibuat array
        $indonesia = array_column($indonesia, 'count');

        $tokyo = chart::select(DB::raw("SUM(rainfall) as count"))->where('country', 'tokyo')
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get()->toArray();
        $tokyo = array_column($tokyo, 'count');

        $malaysia = chart::select(DB::raw("SUM(rainfall) as count"))->where('country', 'malaysia')
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get()->toArray();
        $malaysia = array_column($malaysia, 'count');


        return view('experience/chart')
        ->with('malaysia',json_encode($malaysia,JSON_NUMERIC_CHECK))//kata malaysia yg ga pake tanda $ itu bukan sesuatu dari database melainkan variable untuk mengambil data dr dbase
        ->with('tokyo',json_encode($tokyo,JSON_NUMERIC_CHECK))
        ->with('indonesia',json_encode($indonesia,JSON_NUMERIC_CHECK));

    }
}
