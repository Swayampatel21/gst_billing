@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View GST Bills</h1>
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
                <h3 class="card-title">View GST Bills</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
              
                <div class="card-body">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->id}}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Parties Type Name<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ !empty($getRecord->get_parties_type_name->parties_type_name) ?
                        $getRecord->get_parties_type_name->parties_type_name : '' }}
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Invoice Date<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ date('d-m-Y', strtotime($getRecord->invoice_date)) }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Invoice No<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                        {{ $getRecord->invoice_no }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Item Description<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->item_description }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Total Amount<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->total_amount }}
                    </div>
                  </div>
                    
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CGST Rate<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->cgst_rate }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">SGST Rate<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->sgst_rate }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">IGST Rate<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->igst_rate }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CGST Amount<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->cgst_amount }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">SGST Amount<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->sgst_amount }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">IGST Amount<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->igst_amount }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tex Amount<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->tax_amount }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Net Amount<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->net_amount }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Declaration<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ $getRecord->declaration }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Created At<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ date('d-m-Y H:s A', strtotime($getRecord->created_at)) }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Updated At<span style="color: red;"> *</span></label>
                    <div class="col-sm-8">
                    {{ date('d-m-Y H:s A', strtotime($getRecord->updated_at)) }}

                    </div>
                  </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{ url('admin/gst_bills') }}" class="btn btn-default float-right">Back</a>
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