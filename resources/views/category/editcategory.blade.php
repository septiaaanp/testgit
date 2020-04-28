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
              <li class="breadcrumb-item"><a href="#">Category</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
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
                <form role="form" method="post" action="/blog-categories/update/{{$category->id}}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                  <!-- <div class="row"> -->
                    <div class="form-group col-md-12">
                        <label for="">Title</label>
                        <input type="text" placeholder="Nama Sekolah" id="title" name="title" class="form-control" value="{{ $category->title }}" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Slug</label>
                        <input type="text" value="{{$category->slug}}" placeholder="Nama Sekolah" id="slug" name="slug" class="form-control"  required>
                    </div>
                    
                  <!-- </div> -->
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save'}}</button>
                  <a href="/blog-categories" class="btn btn-danger">Back</a>
                </div>
                </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection