@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Party</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        @include('_message')
        <div class="row">
            
          <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <h1 class="card-title">Search Parties</h1>
            </div>
             <form method="get" action="">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-1">
                  <label>ID</label>
                    <input type="text" name="id" value="{{ Request()->id }}" class="form-control"
                    placeholder="ID">
                  </div>

                  <div class="form-group col-md-3">
                  <label>Party Type Name</label>
                    <input type="text" value="{{ Request()->parties_type_name }}" 
                    name="parties_type_name" class="form-control"
                    placeholder="Party Type Name">
                  </div>

                  
                  <div class="form-group col-md-3">
                  <label>Full Name</label>
                    <input type="text" value="{{ Request()->full_name }}" 
                    name="full_name" class="form-control"
                    placeholder="Full Name">
                  </div>

                  <div class="form-group col-md-3">
                  <label>Phone Number</label>
                    <input type="text" value="{{ Request()->phone_no }}" 
                    name="phone_no" class="form-control"
                    placeholder="Phone Number">
                  </div>

                  <div class="form-group col-md-2">
                  <label>Created At</label>
                    <input type="date" value="{{ Request()->created_at }}" 
                    name="created_at" class="form-control">
                  </div>

                  
                


                  <div style="clear: both;"></div>
                  <br> 
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{ url('admin/parties') }}" class="btn btn-success">Reset</a>
                  </div>

                </div>
              </div> 
             </form>

          </div> 

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Party List</h3>
                <a href="{{ url('admin/parties/add') }}" class="btn btn-primary float-right">Add New Party</a>
                <a href="{{ url('admin/parties/pdf') }}" class="btn btn-success float-right mr-2">PDF Genrator</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Party Type Name</th>
                      <th>Full Name</th>
                      <th>Phone Number</th>
                      <th>Email Id</th>
                      <th>Account Holder Name</th>
                      <th>Account No</th>
                      <th>Bank Name</th>
                      <th>IFSC Code</th>
                      <th>Bank Address</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->parties_type_name }}</td>
                      <td>{{ $value->full_name }}</td>
                      <td>{{ $value->phone_no }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->account_holder_name }}</td>
                      <td>{{ $value->account_no }}</td>
                      <td>{{ $value->bank_name }}</td>
                      <td>{{ $value->ifsc_code }}</td>
                      <td>{{ $value->branch_address }}</td>
                      <td>{{date('d-m-Y', strtotime($value->created_at)) }}</td>


                      <td>
                        <a href="{{ url('admin/parties/pdf_single/'.$value->id) }}"
                        class="btn btn-success"><i class="fas fa-file-pdf"></i></a>

                        <a href="{{ url('admin/parties/view/'.$value->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>


                            <a href="{{ url('admin/parties/edit/'.$value->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ url('admin/parties/delete/'.$value->id) }}"
                             class="btn btn-danger" onclick="return confirm('Are you sure delete?')"><i class="fas fa-trash"></i></a>
                     </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%"> No Record Found</td>
                    </tr>
                   @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request:: 
                    except('page'))->links() !!}
                </ul>
              </div>
            </div>
            <!-- /.card -->


          </div>
      
          <!-- /.col -->
        </div>

        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

@endsection