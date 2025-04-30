@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
      @include('_message')
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
       <!-- Horizontal Form -->
       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Setting Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('admin/setting/update') }}" method="post"
              enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Website Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="web_name" class="form-control"  placeholder="Website Name" required
                      value="{{ $getRecord->web_name }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Website Logo<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="file" name="logo" class="form-control"   
                      value="">
                      @if(!empty($getRecord->logo))
                            @if(file_exists('upload/'.$getRecord->logo))
                            <img src="{{ url('upload/'.$getRecord->logo) }}
                            " style="height: 100px; width: 100px;">
                            @endif
                        @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Website Favicon<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="file" name="favicon" class="form-control"   
                      value="">
                      @if(!empty($getRecord->favicon))
                            @if(file_exists('upload/'.$getRecord->favicon))
                            <img src="{{ url('upload/'.$getRecord->favicon) }}
                            " style="height: 100px; width: 100px;">
                            @endif
                        @endif
                    </div>
                  </div>
                     
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit </button>
                  <a href="{{ url('admin/setting') }}" class="btn btn-default float-right">Reset</a>
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