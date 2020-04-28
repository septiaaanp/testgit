<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\education;
use App\education_file;
use App\User;
use File;
use Auth;

class EducationController extends Controller
{
    public function index()
    {
    
        // mengirim data education ke view
        // $education = User::with('to_education')->find(Auth::user()->id);
        $education = education::all();
        return view('/education/education', ['education' => $education]);

    }

    // method untuk menampilkan view form tambah 
    public function add()
    {
        
        // memanggil view tambah
        return view('education/addeducation');

    }

    public function process(Request $request)
    {

        if (empty($request->file('file'))){
            // $education->file = $education->file;
            $education = new education;
            $education->id_user = $request->input('id_user');
            $education->tahun_masuk = $request->input('tahun_masuk');
            $education->tahun_selesai = $request->input('tahun_selesai');
            $education->sekolah = $request->input('sekolah');
            $education->jurusan = $request->input('jurusan');
            $education->deskripsi = $request->input('deskripsi');
            $education->save();

            $fileimage = new education_file();
            $fileimage->id_education = $education->id;
            $fileimage->filename = $request->input('file');
            $fileimage->education()->associate($education)->save();
          
        }else{
            
            $education = new education;
            $education->id_user = $request->input('id_user');
            $education->tahun_masuk = $request->input('tahun_masuk');
            $education->tahun_selesai = $request->input('tahun_selesai');
            $education->sekolah = $request->input('sekolah');
            $education->jurusan = $request->input('jurusan');
            $education->deskripsi = $request->input('deskripsi');
            $education->save();

            $this->validate($request, [
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $files = $request->file('file');

            foreach ($files as $file) {
 
                    $nama_file = time()."_".$file->getClientOriginalName();
                    // isi dengan nama folder tempat kemana file diupload
                    $tujuan_upload = 'data_education';
                    $file->move($tujuan_upload,$nama_file);

                    $fileimage = new education_file();
                    $fileimage->id_education = $education->id;
                    $fileimage->filename = $nama_file;
                    $fileimage->education()->associate($education)->save();
                    // $education->file()->save($fileimage);
            }   
        }

        return redirect('/education');
    }


    public function edit($id)
    {
        
    $education = education::with('file')->find($id);

    return view('/education/editeducation', ['education' => $education]);

    }

    public function update($id, Request $request)
    {
        // edit file
        if ($request->file('files'))
        {
            $education = education::find($id);
            $education->tahun_masuk = $request->tahun_masuk;
            $education->tahun_selesai = $request->tahun_selesai;
            $education->jurusan = $request->jurusan;
            $education->sekolah = $request->sekolah;
            $education->deskripsi = $request->deskripsi;
            $education->save();

            $this->validate($request, [
                'files' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);      

            $files = $request->file('files');

            foreach ($files as $key => $file) {
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'data_education';
            $file->move($tujuan_upload,$nama_file);

            // $fileimage = new education_file();
            $fileimage = education_file::find($request->id_files[$key]);
            File::delete('data_education/'.$fileimage->filename); //menghapus file lama
            $fileimage->id_education = $education->id;
            $fileimage->filename = $nama_file;
            $fileimage->save();

            }
        }
        // jika save data pertama ga upload file
        elseif ($request->id_file) 
            {

            $education = education::find($id);
            $education->tahun_masuk = $request->tahun_masuk;
            $education->tahun_selesai = $request->tahun_selesai;
            $education->jurusan = $request->jurusan;
            $education->sekolah = $request->sekolah;
            $education->deskripsi = $request->deskripsi;
            $education->save();

            $this->validate($request, [
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $files = $request->file('file');

            foreach ($files as $file) {
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'data_education';
            $file->move($tujuan_upload,$nama_file);

            $fileimage = new education_file();
            $fileimage->id_education = $education->id;
            $fileimage->filename = $nama_file;
            $education->file()->save($fileimage);
            }

            $fileimage = education_file::find($request->id_file);
            $fileimage->delete();

        }
        // tambah data saat edit
        elseif ($request->file('file')) {

            $education = education::find($id);
            $education->tahun_masuk = $request->tahun_masuk;
            $education->tahun_selesai = $request->tahun_selesai;
            $education->jurusan = $request->jurusan;
            $education->sekolah = $request->sekolah;
            $education->deskripsi = $request->deskripsi;
            $education->save();

            $this->validate($request, [
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $files = $request->file('file');

            foreach ($files as $file) {

            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'data_education';
            $file->move($tujuan_upload,$nama_file);

            $fileimage = new education_file();
            $fileimage->id_education = $education->id;
            $fileimage->filename = $nama_file;
            $fileimage->save();

            }

        }
        // edit data tanpa file
        else 
            {

            $education = education::find($id);
            $education->tahun_masuk = $request->tahun_masuk;
            $education->tahun_selesai = $request->tahun_selesai;
            $education->jurusan = $request->jurusan;
            $education->sekolah = $request->sekolah;
            $education->deskripsi = $request->deskripsi;
            $education->save();

        }
        
        return redirect('/education');
    }

    public function deletefile($id_delete, Request $request){
        $fileimage = education_file::find($id_delete);
        // $education = education::findOrFail($request->id_education);
        // $id_education = $education->id;
        File::delete('data_education/'.$fileimage->filename);
        // $fileimage->filename = $request->input('file');
        $fileimage->delete();

        return redirect('/education');
        // return redirect('/education/edit/{$id_education}');
        // $fileimage->delete(); 
    }
    
    public function delete($id)
    {

        $education = education::with('file')->find($id);

        foreach ($education->file as $e) {
             File::delete('data_education/'.$e->filename); //menghapus file lama
        }

        $education->delete();
        return redirect('/education');
    }
}
