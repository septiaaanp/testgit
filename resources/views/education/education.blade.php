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
            <h1>Education</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Education</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dtHorizontalVerticalExample" class="table table-bordered table-striped" cellspacing="0" 
              width="100%">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tahun Masuk</th>
                  <th>Tahun Selesai</th>
                  <th>Sekolah</th>
                  <th>Jurusan</th>
                  <th>Deskripsi</th>
                  <th>File Upload</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($education as $e) 
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $e->tahun_masuk }}</td>
                        <td>{{ $e->tahun_selesai }}</td>
                        <td>{{ $e->sekolah }}</td>
                        <td>{{ $e->jurusan }}</td>
                        <td>{!! str_limit($e->deskripsi, $limit = 150, $end = '...') !!}</td>
                     
                        <td>
                        @foreach($e->file as $f)
                          @if($f->filename == true)<img width="150px" height="100px" src="{{ url('/data_education/'.$f->filename) }}">
                          @else 
                            Tidak ada file
                          @endif
                        @endforeach
                        </td>
                      
                        <td>
                          <a href="/education/edit/{{ $e->id }}" class="btn btn-warning">Edit</a>
                          <a href="/education/delete/{{ $e->id }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Tahun Masuk</th>
                  <th>Tahun Selesai</th>
                  <th>Sekolah</th>
                  <th>Jurusan</th>
                  <th>Deskripsi</th>
                  <th>File Upload</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <div class="box-footer">
                <a class="btn btn-primary" href="/education/addeducation" role="button">Add Data</a>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
@endsection
