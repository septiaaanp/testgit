@extends('layouts.header')
@extends('layouts.leftside')

@push('script')
<script>
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("text");
  var text1 = document.getElementById("text1");
  var text2 = document.getElementById("text2");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none"; //ga muncul
    text1.style.display = "none";
    text2.style.display = "block"; //muncul
  } else {
    text.style.display = "block";
    text1.style.display = "block";
    text2.style.display = "none";
  }
}
</script>
@endpush

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
              <li class="breadcrumb-item"><a href="#">Experience</a></li>
              <li class="breadcrumb-item active">Add Experience</li>
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
                <h3 class="card-title">Edit Experience</h3>
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
                <form role="form" method="post" action="/experience/update/{{ $experience->id }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Nama Perusahaan</label>
                        <input type="text" value="{{ $experience->perusahaan }}" name="perusahaan" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                      Ini adalah posisi saya saat ini: <input type="checkbox" name="checkbox" value="1" id="myCheck" onclick="myFunction()" {{ ($experience->checkbox == 1 ? ' checked' : '') }} >
                    </div>
                       
                    <div class="col-md-3">
                        <div class="form-group">
                        <label>Bulan Masuk</label>
                        <select class="form-control" name="bulan_masuk" required>
                            <option value="{{ $experience->bulan_masuk }}" class="text-muted">{{ $experience->bulan_masuk }}</option>
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
                        <label>Tahun Masuk</label>
                        <select class="form-control" name="tahun_masuk" required>
                            <option value="{{ $experience->tahun_masuk }}" class="text-muted">{{ $experience->tahun_masuk }}</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    @if ($experience->checkbox == 0 ? ' checked' : '')
                    <div id="text2" style="display:none;"  class="col-md-3">
                        <div class="form-group">
                        <label>Tahun Selesai</label>
                        <input type="text" value="Saat Ini" name="sekarang" class="form-control"  readonly>
                        </div>
                    </div>
                    <div id="text" style="display:block;" class="col-md-3">
                        <div class="form-group">
                        <label>Bulan Selesai</label>
                        <select class="form-control" name="bulan_selesai" >
                             <option value="{{ $experience->bulan_selesai }}" class="text-muted">{{ $experience->bulan_selesai }}</option>
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
                    <div id="text1" style="display:block;" class="col-md-3">
                        <div class="form-group">
                        <label>Tahun Selesai</label>
                        <select class="form-control" name="tahun_selesai" >
                            <option value="{{ $experience->tahun_selesai }}" class="text-muted">{{ $experience->tahun_selesai }}</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    @elseif ($experience->checkbox == 1 ? ' checked' : '')
                    <div id="text2" style="display:block;"  class="col-md-3">
                        <div class="form-group">
                        <label>Tahun Selesai</label>
                        <input type="text" value="Saat Ini" name="sekarang" class="form-control"  readonly>
                        </div>
                    </div>
                    <div id="text" style="display:none;" class="col-md-3">
                        <div class="form-group">
                        <label>Bulan Selesai</label>
                        <select class="form-control" name="bulan_selesai" >
                            <option value="" class="text-muted">Pilih Bulan Selesai</option>
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
                    <div id="text1" style="display:none;" class="col-md-3">
                        <div class="form-group">
                        <label>Tahun Selesai</label>
                        <select class="form-control" name="tahun_selesai" >
                            <option value="" class="text-muted">Pilih Tahun Selesai</option>
                            <?php for ( $i = 2000; $i <= date('Y'); $i ++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    @endif
                    <div class="form-group col-md-12">
                        <label for="">Posisi</label>
                        <input type="text" value="{{ $experience->posisi }}" name="posisi" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Deskripsi</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="deskripsi" placeholder="Deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                              {{ $experience->deskripsi }}
                            </textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group col-md-12">
                        <label for="exampleInputFile">File input</label>
                    <div class="form-group multiple-form-group input-group">
                        <input type="file" id="exampleInputFile" name="file[]" class="form-control" multiple>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add">Add</button>
                        </span>
                    </div> -->
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