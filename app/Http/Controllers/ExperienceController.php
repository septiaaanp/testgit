<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\experience;
use DB;

class ExperienceController extends Controller
{
     public function index()
 
    { 

        $experience = experience::all();
        return view('experience/experience', ['experience' => $experience]);

    }
    // method untuk menampilkan view form tambah 
    public function add()
    {
        
        // memanggil view tambah
        return view('experience/addexperience');

    }

    public function process(Request $request)
    {

        $this->validate($request,[
            'perusahaan' => 'required',
            'bulan_masuk' => 'required',
            'tahun_masuk' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required'
            ]);

        $experience = new experience();
        $experience->perusahaan = $request->input('perusahaan');
        $experience->bulan_masuk = $request->input('bulan_masuk');
        $experience->tahun_masuk = $request->input('tahun_masuk');
        $experience->bulan_selesai = $request->input('bulan_selesai');
        $experience->tahun_selesai = $request->input('tahun_selesai');
        $experience->sekarang = $request->input('sekarang');
        $experience->posisi = $request->input('posisi');
        $experience->deskripsi = $request->input('deskripsi');
        $experience->checkbox = $request->has('checkbox');
        $experience->save();

    	return redirect('/experience');
    }

    public function edit($id)
    {
        $experience = experience::find($id);
        return view('/experience/editexperience', ['experience' => $experience]);
    }

    public function update($id,  Request $request)
    {
        $this->validate($request,[
            'perusahaan' => 'required',
            'bulan_masuk' => 'required',
            'tahun_masuk' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required'
            ]);

        if ($request->has('checkbox')) {

            $experience = experience::find($id);
            $experience->perusahaan = $request->input('perusahaan');
            $experience->bulan_masuk = $request->input('bulan_masuk');
            $experience->tahun_masuk = $request->input('tahun_masuk');
            $experience->bulan_selesai = $request->input('null');
            $experience->tahun_selesai = $request->input('null');
            $experience->sekarang = $request->input('sekarang');
            $experience->posisi = $request->input('posisi');
            $experience->deskripsi = $request->input('deskripsi');
            $experience->checkbox = $request->has('checkbox');
            $experience->save();
        }
        else{

            $experience = experience::find($id);
            $experience->perusahaan = $request->input('perusahaan');
            $experience->bulan_masuk = $request->input('bulan_masuk');
            $experience->tahun_masuk = $request->input('tahun_masuk');
            $experience->bulan_selesai = $request->input('bulan_selesai');
            $experience->tahun_selesai = $request->input('tahun_selesai');
            $experience->sekarang = $request->input('null');
            $experience->posisi = $request->input('posisi');
            $experience->deskripsi = $request->input('deskripsi');
            $experience->checkbox = $request->has('checkbox');
            $experience->save();
        }
        return redirect('/experience');

    }

    public function delete($id)
    {
        $experience = experience::find($id);
        $experience->delete();
        return redirect('/experience');
    }
}
