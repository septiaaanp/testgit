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
              <li class="breadcrumb-item active">Profile</li>
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
                <h3 class="card-title">Add Profile</h3>
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
                <form role="form" method="post" action="/profile/process/{{ $user->id }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                @if(empty($user->profile->id))
				<input name="id_user"  value="" hidden="">
                @else
                <input name="id_user"  value="{{$user->profile->id}}" hidden="">
                @endif
                  <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Nama</label>
                        <input type="text" value ="{{ Auth::user()->name }}" name="nama" class="form-control" required disabled="">
                    </div>

                    @if(empty($user->profile->ttl))
                    <div class="form-group col-md-12">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="ttl" class="form-control" required>
                    </div>
                    @else
                    <div class="form-group col-md-12">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" value ="{{ $user->profile->ttl }}" name="ttl" class="form-control" required>
                    </div>
                    @endif

                    @if(empty($user->profile->alamat))
                    <div class="form-group col-md-12">
                        <label for="">Alamat</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="alamat" placeholder="Alamat" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                            	
                            </textarea>
                        </div>
                    </div>
                    @else
                    <div class="form-group col-md-12">
                        <label for="">Alamat</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="alamat" placeholder="Alamat" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                            	{{ $user->profile->alamat }}
                            </textarea>
                        </div>
                    </div>
                    @endif
                    <!-- jika data tidak ada di table -->
                    @if(empty($user->profile->email))
					<div class="form-group col-md-12">
                        <label for="">Email</label>
                        <input type="text" placeholder="Email" name="email" class="form-control" required>
                    </div>
                    @else
                    <div class="form-group col-md-12">
                        <label for="">Email</label>
                        <input type="text" value ="{{ $user->profile->email }}" name="email" class="form-control" required>
                    </div>
                	@endif
                    
                    @if(empty($user->profile->hp))
                    <div class="form-group col-md-12">
                        <label for="">No. Handphone</label>
                        <input type="number" name="hp" class="form-control" placeholder="No Handphone" required>
                    </div>
                    @else
                    <div class="form-group col-md-12">
                        <label for="">No. Handphone</label>
                        <input type="number" name="hp" class="form-control" value ="{{ $user->profile->hp }}" required>
                    </div>
                    @endif

                    @if(empty($user->profile->about))
                    <div class="form-group col-md-12">
                        <label for="">About Me</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="about" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                            	
                            </textarea>
                        </div>
                    </div>
                    @else
                    <div class="form-group col-md-12">
                        <label for="">About Me</label>
                        <div class="mb-3">
                            <textarea class="textarea" name="about" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $user->profile->about }}</textarea>
                        </div>
                    </div>
                    @endif

                    @if(empty($user->profile->cv))
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">CV</label>
                    <div class="form-group multiple-form-group input-group">
                        <input type="file" name="cv" class="form-control" multiple>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success">Add</button>
                        </span>
                    </div>
                    </div>
                    @else
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">CV</label>
                    <div class="form-group multiple-form-group input-group">
                        <input type="file" name="cv" class="form-control" multiple>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success">Add</button>
                        </span>
                    </div>
                    <a href="{{ url('/data_profile/'.$user->profile->cv) }}" target="_blank">{{ url('/data_profile/'.$user->profile->cv) }}</a>
                	</div>
                    @endif
                	
                    @if(empty($user->profile->foto))
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">Foto Profile</label>
                    <div class="form-group multiple-form-group input-group">
                        <input type="file" name="foto" class="form-control" multiple>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success">Add</button>
                        </span>
                    </div>
                	</div>
                    @else
                    <div class="form-group col-md-12">
                        <label for="exampleInputFile">Foto Profile</label>
                    <div class="form-group multiple-form-group input-group">
                        <input type="file" name="foto" class="form-control" multiple>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success">Add</button>
                        </span>
                    </div>
                    <img width="150px" height="100px" src="{{ url('/data_profile/'.$user->profile->foto) }}">
                    </div>
                    @endif
                  </div>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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