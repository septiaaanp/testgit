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
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
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
                <form role="form" method="post" action="/blog-admin/store" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="box-body">
                  <!-- <div class="row"> -->
                    <div class="form-group col-md-12">
                        <label for="">Title</label>
                        <input type="text" placeholder="Nama Sekolah" id="title" name="title" class="form-control" value="{{ old('sekolah') }}" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Slug</label>
                        <input type="text" placeholder="Nama Sekolah" id="slug" name="slug" class="form-control"  required>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="">Excerpt</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="excerpt" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Body</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="body" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div> 
                    <div class="form-group col-md-12">                              

                  <!-- </div> -->
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.card-body -->
               
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
          <div class="col-md-3">
            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title">Featured Image</h3>
              </div>
              <div class="box-body">
               <div class="form-group col-md-12 {{ $errors->has('image') ? 'has-error' : ''}}">
                      {!! Form::label('image', 'Featured Image') !!}
                      <br>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                          <img src="http://placehold.it/200x150&text=No+Image" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                          <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                          {!! Form::file('image') !!}
                        </span>
                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                     
                      @if($errors->has('image'))
                        <span class="badge badge-danger">{{ $errors->first('image') }}</span>
                      @endif
                </div>  
              </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title">Category</h3>
              </div>
              <div class="box-body">
                  <!-- <div class="row"> -->
                    <div class="form-group col-md-12">
                        <label>Category</label>
                        {!! Form::select('category_id', App\Category::pluck('title','id'), null, ['class'=>'form-control', 'placeholder' => 'Select Category']) !!}                            
                        </select>
                    </div>
              </div>
            </div>

            <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title">Publish Date</h3>
              </div>
              <div class="box-body">
                  <!-- <div class="row"> -->
                    <div class="form-group col-md-12">
                        <label for="">Published Date</label>
                        <input type="text" placeholder="'Date Format: Y-m-d H:i:s'" name="published_at" class="form-control" required>
                    </div>
              </div>
              <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-warning">Save a Draft</a>
                <button type="submit" class="btn btn-primary">Published</button> 
              </div>
            </form>
          </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection