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
              <li class="breadcrumb-item"><a href="#">Certificate</a></li>
              <li class="breadcrumb-item active">Add Certificate</li>
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
                <h3 class="card-title">Add Certificate</h3>
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
                <form role="form" method="post" action="/certificate/update/{{ $certificate->id }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Nama Certificate</label>
                        <input type="text" value="{{ $certificate->certificate }}" name="certificate" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Nama Penerbit</label>
                        <input type="text" value="{{ $certificate->penerbit }}" name="penerbit" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Bulan Penerbitan</label>
                        <select class="form-control" name="bulan_terbit" required>
                           <option value="{{ $certificate->bulan_terbit }}" class="text-muted">{{ $certificate->bulan_terbit }}</option>
                                <option value="01 - Januari">01 - Januari</option>
                                <option value="02 - Februari">02 - Februari</option>
                                <option value="03 - Maret">03 - Maret</option>
                                <option value="04 - April">04 - April</option>
                                <option value="05 - Mei">05 - Mei</option>
                                <option value="06 - Juni">06 - Juni</option>
                                <option value="07 - Juli">07 - Juli</option>
                                <option value="08 - Agustus">08 - Agustus</option>
                                <option value="09 - September">09 - September</option>
                                <option value="10 - Oktober">10 - Oktober</option>
                                <option value="11 - November">11 - November</option>
                                <option value="12 - Desember">12 - Desember</option> 
                        </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Tahun Penerbitan</label>
                        <select class="form-control" name="tahun_terbit" required>
                            <option value="{{ $certificate->tahun_terbit }}" class="text-muted">{{ $certificate->tahun_terbit }}</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">File Certificate</label>
                    <div class="form-group multiple-form-group input-group">
                        <input type="file" id="exampleInputFile" name="file" class="form-control" multiple>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success">Add</button>
                        </span>
                    </div>
                    <img width="150px" height="100px" src="{{ url('/data_certificate/'.$certificate->file) }}">
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