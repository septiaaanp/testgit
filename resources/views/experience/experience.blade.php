@extends('layouts.header')
@extends('layouts.leftside')

@section('content')
 <!-- !-- Content Wrapper. Contains page content --> -->
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
              <li class="breadcrumb-item active">Experience</li>
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
                  <th>Perusahaan</th>
                  <th>Tahun Masuk</th>
                  <th>Tahun Selesai</th>
                  <th>Posisi</th>
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($experience as $e)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $e->perusahaan }}</td>
                    <td>{{ $e->tahun_masuk }}</td>
                    <td>@if(is_null( $e->tahun_selesai))
                        {{ $e->sekarang }}
                        @else
                        {{ $e->tahun_selesai }}
                        @endif
                    </td>
                    <td>{{ $e->posisi }}</td>
                    <td>{!! str_limit($e->deskripsi, $limit = 140, $end = '...') !!}</td>
                    <td>
                      <a href="/experience/edit/{{ $e->id }}" class="btn btn-warning">Edit</a>
                      <a href="/experience/delete/{{ $e->id }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Perusahaan</th>
                  <th>Tahun Masuk</th>
                  <th>Tahun Selesai</th>
                  <th>Posisi</th>
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <div class="box-footer">
                <a class="btn btn-primary" href="/experience/addexperience" role="button">Add Data</a>
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
