@extends('layouts.header')
@extends('layouts.leftside')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Education</a></li>
              <li class="breadcrumb-item active">Add Education</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Education</h3>
              </div>
                <!-- /.card-header -->
                <div class="card-body">
                <!-- form start -->
                <form role="form" method="post" action="/education/update/{{ $education->id }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                  <div class="row">
                    <input name="id_education"  value="{{$education->id}}" hidden="">
                    <div class="form-group col-md-12">
                        <label for="">Nama Sekolah</label>
                        <input type="text" value=" {{ $education->sekolah }}" name="sekolah" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Tahun Masuk</label>
                        <select class="form-control" name="tahun_masuk" >
                            <option value="{{ $education->tahun_masuk }}" class="text-muted">{{ $education->tahun_masuk }}</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Tahun Selesai</label>
                        <select class="form-control" name="tahun_selesai" >
                            <option value="{{ $education->tahun_selesai }}" class="text-muted">{{ $education->tahun_selesai }}</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Jurusan</label>
                        <input type="text" value=" {{ $education->jurusan }}" name="jurusan" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Deskripsi</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="deskripsi" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $education->deskripsi }}</textarea>
                        </div>
                    </div>
                   
                    <div class="form-group col-md-12">
                      <label for="exampleInputFile">File input</label><br>
         
                      <div class="row">
                      @foreach($education->file as $e)
                      @if($e->filename == true)
                      <div class="col-sm-3 col-xs-12">
                        <div class="card">
                          <img class="rounded mx-auto d-block" width="220px" height="150px" src="{{ url('/data_education/'.$e->filename) }}">
                          <input name="id_files[]"  value="{{$e->id}}" hidden="">
                          <div class="card-body">
                           <div class ="btn btn-warning btn-file btn-md">
                              <i class ="glyphicon glyphicon-floppy-open" aria-hidden="true"></i>
                              <input type="file" name="files[]" />Edit
                           </div>
                           <a href="/education/edit/delete/{{ $e->id }}" class="btn btn-danger">Delete</a>
                          </div>
                        </div>      
                      </div>
                      @else
                        <input name="id_file"  value="{{$e->id}}">
                        &nbsp;&nbsp;Tidak ada file
                      @endif
                      @endforeach
                      </div>
                      
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">Add file</label>
                    <div class="form-group multiple-form-group input-group">
                        <input type="file" id="exampleInputFile" name="file[]" class="form-control" multiple>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add">Add</button>
                        </span>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                </div>
                </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection