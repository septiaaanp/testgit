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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                             @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                             @endforeach
                        </ul>
                    </div>
                @endif
                <!-- form start -->
                <form role="form" method="post" action="/addeducation/process" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="box-body">
                  <div class="row">
                    <input name="id_user"  value="{{ Auth::user()->id }}" >
                    <div class="form-group col-md-12">
                        <label for="">Nama Sekolah</label>
                        <input type="text" placeholder="Nama Sekolah" name="sekolah" class="form-control" value="{{ old('sekolah') }}" required>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Tahun Masuk</label>
                        <select class="form-control" name="tahun_masuk" required>
                            <option value="" class="text-muted">Pilih Tahun Mulai</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Tahun Selesai</label>
                        <select class="form-control" name="tahun_selesai" required>
                            <option value="" class="text-muted">Pilih Tahun Selesai</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Jurusan</label>
                        <input type="text" placeholder="Jurusan" name="jurusan" class="form-control" value="{{ old('jurusan') }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Deskripsi</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="deskripsi" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">File input</label>
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