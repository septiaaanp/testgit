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
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content-header -->     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Blog Posts</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
 
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            
 
              <!-- /.card-header -->
              <div class="card-body p-1">
                <div class="row">
                  <div class="col-md-6" style="padding-left: 10px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; ">
                      <a href="/blog-categories/create" class="btn btn-info float-left">
                        <span>
                          <i class="fa fa-plus-circle"></i>
                        <span>
                              Add Post
                        </span>
                        </span>
                      </a>
                  </div>
                  <div class="col-md-6" style="padding-left: 10px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; ">
                    <div class="float-right" style="color: blue;">
                      
                    </div>
                  </div>
                </div>

                @if(session('message'))
                  <div class="alert alert-info">
                    {{ session('message') }}
                  </div>
                @elseif(session('trash-message'))
                <?php list($message, $postId) = session('trash-message') ?>
                {!! Form::open(['method'=>'PUT', 'route' => ['backend.blog.restore', $postId]]) !!}
                  <div class="alert alert-info">
                    {{ $message }}
                      <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i>Undo</button>
                  </div>
                {!! Form::close() !!}
                @endif
             
                @if(!$categories->count())
                <div class="alert alert-danger">
                  <strong>No Record Found</strong>
                </div>
                @else
                <table class="table table-striped">
                  <tr>
                   
                    <th width="20%">Category</th>
                    <th width="20%">Post Count</th>
                    <th width="10%">Action </th>
                  </tr>
                  @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->posts->count() }}</td>
                    <td>
                      <a href="/blog-categories/edit/{{ $category->id }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
                      @if($category->id == config('cms.default_category_id'))
                        <button onclick="return false" type="submit" class="btn btn-sm btn-danger disabled"><i class="fa fa-times"></i></button>
                      @else
                        <a href="/blog-categories/delete/{{ $category->id }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                      @endif
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </table>

                @endif
              </div>
              <div class="card-footer clearfix">
                <div class="pull-left" id="pagination">
                  {{ $categories->appends( Request::query() )->render() }}
                </div>
                <div class="pull-right">
                  <?php $categoriesCount = $categories->count();?>
                  <small style="padding-right: 25px;">{{ $categoriesCount }} out of {{ $categoriesCount }} {{ str_plural('Items', $categoriesCount) }}</small>
                </div>
              </div>                                                         
             
            </div>
            <!-- /.card -->
          </div>
             
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
@endsection
