<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\certificate;
use File;

class CertificateController extends Controller
{	
	
    public function index()
    { 
        $certificate = certificate::all();
        return view('certificate/certificate', ['certificate' => $certificate]);
    }

    public function add(){
    	return view('/certificate/addcertificate');
    }

    public function process(Request $request)
    {

    	$this->validate($request,[
            'certificate' => 'required',
            'penerbit' => 'required',
            'bulan_terbit' => 'required',
            'tahun_terbit' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
	    // isi dengan nama folder tempat kemana file diupload
	    $tujuan = 'data_certificate';
	    $file->move($tujuan,$nama_file);

    	$certificate = new certificate();
    	$certificate->certificate = $request->input('certificate');
    	$certificate->penerbit = $request->input('penerbit');
        $certificate->bulan_terbit = $request->input('bulan_terbit');
        $certificate->tahun_terbit = $request->input('tahun_terbit');
        $certificate->file = $nama_file;
        $certificate->save();

    	return redirect('/certificate');
    }

    public function edit($id)
    {
        $certificate = certificate::find($id);
        return view('/certificate/editcertificate', ['certificate' => $certificate]);
    }

    public function update($id,  Request $request)
    {
    	$this->validate($request,[
            'certificate' => 'required',
            'penerbit' => 'required',
            'bulan_terbit' => 'required',
            'tahun_terbit' => 'required',
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasfile('file')){

        	$file = $request->file('file');
			$nama_file = time()."_".$file->getClientOriginalName();
		    // isi dengan nama folder tempat kemana file diupload
		    $tujuan = 'data_certificate';
		    $file->move($tujuan,$nama_file);

        	$certificate = certificate::find($id);
        	File::delete('data_certificate/'.$certificate->file);
        	$certificate->certificate = $request->input('certificate');
	    	$certificate->penerbit = $request->input('penerbit');
	        $certificate->bulan_terbit = $request->input('bulan_terbit');
	        $certificate->tahun_terbit = $request->input('tahun_terbit');
	        $certificate->file = $nama_file;
	        $certificate->save();

        }else{

        	$certificate = certificate::find($id);
        	$certificate->certificate = $request->input('certificate');
	    	$certificate->penerbit = $request->input('penerbit');
	        $certificate->bulan_terbit = $request->input('bulan_terbit');
	        $certificate->tahun_terbit = $request->input('tahun_terbit');
	        $certificate->save();
        }

        	return redirect('/certificate');

    }
}
