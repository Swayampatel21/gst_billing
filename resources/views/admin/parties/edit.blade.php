@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Parties</h1>
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
                <h3 class="card-title">Edit Parties</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('admin/parties/edit/'.
              $getRecord->id) }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parties Type<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                        <select name="parties_type_id" class="form-control">
                            @foreach($getPartiesType as $value)
                            <option {{ ($getRecord->parties_type_id == $value->id) ?'selected' :''}}
                                value="{{ $value->id }}">{{ $value->parties_type_name }}</option>
                            @endforeach
                        </select>
                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Full Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->full_name }}" name="full_name" class="form-control" 
                       placeholder="Full Name" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone Numbere<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text"  value="{{ $getRecord->phone_no }}" name="phone_no" class="form-control" 
                       placeholder="Phone Numbere" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Address<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->address }}" name="address" class="form-control" 
                       placeholder="Enter Address" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Account Holder Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->account_holder_name }}" name="account_holder_name" class="form-control" 
                       placeholder="Enter Account Holder Name" required>
                    </div>
                  </div>

                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Account Number<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->account_no }}" name="account_no" class="form-control" 
                       placeholder="Enter Account Number" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Bank Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->bank_name }}" name="bank_name" class="form-control" 
                       placeholder="Enter Bank Name" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter IFSC Code<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->ifsc_code }}" name="ifsc_code" class="form-control" 
                       placeholder="Enter IFSC Code" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Bank Address<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->branch_address }}" name="branch_address" class="form-control" 
                       placeholder="Enter Bank Address" required>
                    </div>
                  </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update </button>
                  <a href="{{ url('admin/parties') }}" class="btn btn-default float-right">Cancel</a>
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