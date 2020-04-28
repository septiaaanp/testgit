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
            <h1>Certificate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Certificate</li>
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
                  <th>Nama Certificate</th>
                  <th>Penerbit Certificate</th>
                  <th>Bulan Terbit</th>
                  <th>Tahun Terbit</th>
                  <th>File</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($certificate as $c) 
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $c->certificate }}</td>
                        <td>{{ $c->penerbit }}</td>
                        <td>{{ $c->bulan_terbit }}</td>
                        <td>{{ $c->tahun_terbit }}</td>
                        <td><img width="150px" height="100px" src="{{ url('/data_certificate/'.$c->file) }}"></td>                    
                        <td>
                          <a href="/certificate/edit/{{ $c->id }}" class="btn btn-warning">Edit</a>
                          <a href="/certificate/delete/{{ $c->id }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Certificate</th>
                  <th>Penerbit Certificate</th>
                  <th>Bulan Terbit</th>
                  <th>Tahun Terbit</th>
                  <th>File</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <div class="box-footer">
                <a class="btn btn-primary" href="/certificate/addcertificate" role="button">Add Data</a>
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
