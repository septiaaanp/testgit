<?php

namespace App\Http\Controllers;
use App\profile;
use App\User;
use File;
use View;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id){

	    // $user = User::find($id);
	    $user = User::with('profile')->find($id);
	    // $profile = profile::find($id);
	    return view('/profile/profile', ['user' => $user]);
	     //  view()->share('user', $user);

    }

 //    public function __construct() {
	//   $user = User::with('profile')->find($id);
	//   View::share('user', $user);
	// }

    public function process($id, Request $request){

    	$user = User::with('profile')->find($id);
		
    	if (empty($request->id_user)) {

    		$this->validate($request,[
			'ttl' => 'required',
		    'alamat' => 'required',
		    'email' => 'required',
		    'hp' => 'required',
		    'about' => 'required',
		    'cv' => 'required|file|mimes:pdf|max:2048',
		    'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
			]);

    		$cv = $request->file('cv');
			$nama_cv = time()."_".$cv->getClientOriginalName();
	        // isi dengan nama folder tempat kemana file diupload
	        $tujuan_upload = 'data_profile';
	        $cv->move($tujuan_upload,$nama_cv);

	        $foto = $request->file('foto');
			$nama_foto = time()."_".$foto->getClientOriginalName();
	        // isi dengan nama folder tempat kemana file diupload
	        $tujuan = 'data_profile';
	        $foto->move($tujuan,$nama_foto);

    		$profile = new profile();
	        // $profile->nama = $request->nama;
	        $profile->ttl = $request->ttl;
	        $profile->alamat = $request->alamat;
	        $profile->email = $request->email;
	        $profile->hp = $request->hp;
	        $profile->about = $request->about;
	        $profile->cv =  $nama_cv;
	        $profile->foto = $nama_foto;
	        $profile->User()->associate($user)->save();
    	}
    	elseif (empty($request->file('cv') or $request->file('foto'))) {

    		$this->validate($request,[
			'ttl' => 'required',
		    'alamat' => 'required',
		    'email' => 'required',
		    'hp' => 'required',
		    'about' => 'required'
			]);

    		$profile = profile::find($request->id_user);
    		$profile->ttl = $request->ttl;
	        $profile->alamat = $request->alamat;
	        $profile->email = $request->email;
	        $profile->hp = $request->hp;
	        $profile->about = $request->about;
	        $profile->User()->associate($user)->save();	
    	}
    	// jika ubah cv saja
    	elseif (empty( $request->file('foto'))) {

    		$this->validate($request,[
			'ttl' => 'required',
		    'alamat' => 'required',
		    'email' => 'required',
		    'hp' => 'required',
		    'about' => 'required',
		    'cv' => 'file|mimes:pdf|max:2048'
			]);

    		$cv = $request->file('cv');
			$nama_cv = time()."_".$cv->getClientOriginalName();
	        // isi dengan nama folder tempat kemana file diupload
	        $tujuan_upload = 'data_profile';
	        $cv->move($tujuan_upload,$nama_cv);

    		$profile = profile::find($request->id_user);
	        // $profile->nama = $request->nama;
	        File::delete('data_profile/'.$profile->cv);
	        $profile->ttl = $request->ttl;
	        $profile->alamat = $request->alamat;
	        $profile->email = $request->email;
	        $profile->hp = $request->hp;
	        $profile->about = $request->about;
	        $profile->cv =  $nama_cv;
	        // $profile->foto = $nama_foto;
	        $profile->User()->associate($user)->save();
    	}
    	elseif (empty($request->file('cv'))) {

    		$this->validate($request,[
			'ttl' => 'required',
		    'alamat' => 'required',
		    'email' => 'required',
		    'hp' => 'required',
		    'about' => 'required',
		    'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
			]);

	        $foto = $request->file('foto');
			$nama_foto = time()."_".$foto->getClientOriginalName();
	        // isi dengan nama folder tempat kemana file diupload
	        $tujuan = 'data_profile';
	        $foto->move($tujuan,$nama_foto);

    		$profile = profile::find($request->id_user);
	        // $profile->nama = $request->nama;
	        File::delete('data_profile/'.$profile->foto);
	        $profile->ttl = $request->ttl;
	        $profile->alamat = $request->alamat;
	        $profile->email = $request->email;
	        $profile->hp = $request->hp;
	        $profile->about = $request->about;
	        // $profile->cv =  $nama_cv;
	        $profile->foto = $nama_foto;
	        $profile->User()->associate($user)->save();
    	}

    	else{

    		$this->validate($request,[
			'ttl' => 'required',
		    'alamat' => 'required',
		    'email' => 'required',
		    'hp' => 'required',
		    'about' => 'required',
		    'cv' => 'file|mimes:pdf|max:2048',
		    'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
			]);

    		$cv = $request->file('cv');
			$nama_cv = time()."_".$cv->getClientOriginalName();
	        // isi dengan nama folder tempat kemana file diupload
	        $tujuan_upload = 'data_profile';
	        $cv->move($tujuan_upload,$nama_cv);

	        $foto = $request->file('foto');
			$nama_foto = time()."_".$foto->getClientOriginalName();
	        // isi dengan nama folder tempat kemana file diupload
	        $tujuan = 'data_profile';
	        $foto->move($tujuan,$nama_foto);

    		$profile = profile::find($request->id_user);
	        // $profile->nama = $request->nama;
	        File::delete('data_profile/'.$profile->cv);
	        File::delete('data_profile/'.$profile->foto);
	        $profile->ttl = $request->ttl;
	        $profile->alamat = $request->alamat;
	        $profile->email = $request->email;
	        $profile->hp = $request->hp;
	        $profile->about = $request->about;
	        $profile->cv =  $nama_cv;
	        $profile->foto = $nama_foto;
	        $profile->User()->associate($user)->save();
    	}
	
        return redirect('/home');
    }
}
