@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>GST BILLS</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('_message')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Search GST Bills</h1>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-1">
                                        <label>ID</label>
                                        <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Party Type Name</label>
                                        <input type="text" value="{{ Request()->parties_type_name }}" name="parties_type_name" class="form-control" placeholder="Party Type Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Invoice Date</label>
                                        <input type="date" value="{{ Request()->invoice_date }}" name="invoice_date" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Invoice No</label>
                                        <input type="text" value="{{ Request()->invoice_no }}" name="invoice_no" class="form-control" placeholder="Invoice No">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Total Amount</label>
                                        <input type="number" value="{{ Request()->total_amount }}" name="total_amount" class="form-control" placeholder="Total Amount">
                                    </div>
                                    <div style="clear: both;"></div>
                                    <br>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <a href="{{ url('admin/gst_bills') }}" class="btn btn-success">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">GST BILLS List</h3>
                            <a href="{{ url('admin/gst_bills/add') }}" class="btn btn-primary float-right">Add New GST BILLS</a>
                            <a href="{{ url('admin/gst_bills/pdf-download') }}" class="btn btn-success float-right mr-2">PDF Download</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Party Type Name</th>
                                        <th>Invoice Date</th>
                                        <th>Invoice No</th>
                                        <th>Total Amount</th>
                                        <th>Tax Amount</th>
                                        <th>Net Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $totalAmount = 0;
                                    @endphp
                                    @forelse($getRecord as $value)
                                    @php
                                    $totalAmount += $value->total_amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->parties_type_name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->invoice_date)) }}</td>
                                        <td>{{ $value->invoice_no }}</td>
                                        <td>Rs.{{ number_format($value->total_amount, 2) }}</td>
                                        <td>Rs.{{ number_format($value->tax_amount, 2) }}</td>
                                        <td>Rs.{{ number_format($value->net_amount, 2) }}</td>
                                        <td>
                                            <a href="{{ url('admin/gst_bills/pdf_single_row_download/'.$value->id) }}" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
                                            <a href="{{ url('admin/gst_bills/view/'.$value->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('admin/gst_bills/edit/'.$value->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ url('admin/gst_bills/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure delete?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%">No Record Found</td>
                                    </tr>
                                    @endforelse
                                    @if(!empty($totalAmount))
                                    <tr>
                                        <th colspan="4">Total (Rs)</th>
                                        <td>Rs.{{ number_format($totalAmount, 2) }}</td>
                                        <th colspan="3"></th>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $getRecord->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection