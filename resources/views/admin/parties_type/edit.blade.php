@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Parties Type</h1>
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
       <!-- Horizontal Form -->
       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Parties Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('admin/parties_type/edit/'.$getRecord->id) }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parties Type Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="parties_type_name" class="form-control" value="{{ $getRecord->parties_type_name }}" 
                      placeholder="Parties Type Name" required>
                    </div>
                  </div>
                  
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update </button>
                  <a href="{{ url('admin/parties_type') }}" class="btn btn-default float-right">Cancel</a>
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