@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Account</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @include('_message')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
       <!-- Horizontal Form -->
       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">My Account Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('admin/my_account/update') }}" method="post"
              enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="name" class="form-control"  placeholder="Enter Name" required
                      value="{{ $getRecord->name }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control"  placeholder="Enter Email" required
                      value="{{ $getRecord->email }}">
                      <span style="color: red;">{{ $errors->first('email') }}</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Profile Image<span style="color: red;"></span></label>
                    <div class="col-sm-8">
                      <input type="file" name="profile_image" class="form-control">
                        @if(!empty($getRecord->profile_image))
                            @if(file_exists('upload/'.$getRecord->profile_image))
                            <img src="{{ url('upload/'.$getRecord->profile_image) }}
                            " style="height: 100px; width: 100px;">
                            @endif
                        @endif

                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password<span style="color: red;"> </span></label>
                    <div class="col-sm-8">
                      <input type="text" name="password" class="form-control"  placeholder="Enter Password" >
                      (Leave blank if you are not changing the password)
                    </div>
                  </div>
                  
                  
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit </button>
                  <a href="{{ url('admin/my_account') }}" class="btn btn-default float-right">Reset</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
</div>
</div>
</div>
</div>

@endsection