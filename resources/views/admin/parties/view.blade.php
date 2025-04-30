@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Parties</h1>
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
                <h3 class="card-title">View Parties</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
             
              <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                        {{ $getRecord->id }}
                        
                    </div>
                  </div>

                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Parties Type Name<span style="color: red;"> *</span></label>

                    <div class="col-sm-8">
                        {{ !empty($getRecord->get_parties_type_sigle->parties_type_name) ? 
                            $getRecord->get_parties_type_sigle->parties_type_name : '' }}     
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Owner Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->full_name  }}   
                      
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone Numbere<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->phone_no  }}   
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Address<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->address  }}   
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Account Holder Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->account_holder_name }}   
                    </div>
                  </div>

                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Account Number<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->account_no  }}   
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Bank Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->bank_name  }}   
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter IFSC Code<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->ifsc_code  }}   
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Enter Bank Address<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->branch_address  }}   
                    </div>
                  </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
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