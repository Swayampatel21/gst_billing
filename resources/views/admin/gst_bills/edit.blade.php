@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit GST Bills</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit GST Bills</h3>
                        </div>
                        <form class="form-horizontal" action="{{ url('admin/gst_bills/edit/' . $getRecord->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Parties Type Name<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="parties_type_id" required>
                                            @foreach($getPartiesType as $value)
                                            <option {{ $getRecord->parties_type_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->parties_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Invoice Date<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" value="{{ $getRecord->invoice_date }}" name="invoice_date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Invoice No<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $getRecord->invoice_no }}" placeholder="Invoice No" name="invoice_no" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Item Description<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <textarea name="item_description" class="form-control" placeholder="Item Description" required>{{ $getRecord->item_description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Total Amount<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->total_amount }}" placeholder="Total Amount" name="total_amount" id="total_amount" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">GST Rate (%)<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <select name="gst_rate" id="gst_rate" class="form-control" required>
                                            <option value="5" {{ ($getRecord->cgst_rate + $getRecord->sgst_rate == 5 || $getRecord->igst_rate == 5) ? 'selected' : '' }}>5%</option>
                                            <option value="12" {{ Young's Modulus($getRecord->cgst_rate + $getRecord->sgst_rate == 12 || $getRecord->igst_rate == 12) ? 'selected' : '' }}>12%</option>
                                            <option value="18" {{ ($getRecord->cgst_rate + $getRecord->sgst_rate == 18 || $getRecord->igst_rate == 18) ? 'selected' : '' }}>18%</option>
                                            <option value="28" {{ ($getRecord->cgst_rate + $getRecord->sgst_rate == 28 || $getRecord->igst_rate == 28) ? 'selected' : '' }}>28%</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Interstate Transaction</label>
                                    <div class="col-sm-8">
                                        <input type="checkbox" name="is_interstate" id="is_interstate" value="1" {{ $getRecord->igst_rate > 0 ? 'checked' : '' }}>
                                        <label for="is_interstate">Check if Interstate (IGST applies)</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tax Amount<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->tax_amount }}" placeholder="Tax Amount" name="tax_amount" id="tax_amount" class="form-control" readonly required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">CGST Rate (%)</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->cgst_rate }}" name="cgst_rate" id="cgst_rate" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">SGST Rate (%)</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->sgst_rate }}" name="sgst_rate" id="sgst_rate" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">IGST Rate (%)</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->igst_rate }}" name="igst_rate" id="igst_rate" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">CGST Amount</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->cgst_amount }}" name="cgst_amount" id="cgst_amount" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">SGST Amount</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->sgst_amount }}" name="sgst_amount" id="sgst_amount" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">IGST Amount</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->igst_amount }}" name="igst_amount" id="igst_amount" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Net Amount</label>
                                    <div class="col-sm-8">
                                        <input type="number" step="0.01" value="{{ $getRecord->net_amount }}" name="net_amount" id="net_amount" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Declaration<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                        <textarea name="declaration" class="form-control" placeholder="Declaration" required>{{ $getRecord->declaration }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{ url('admin/gst_bills') }}" class="btn btn-default float-right">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('scripts')
<script>
    function calculateGST() {
        const totalAmount = parseFloat(document.getElementById('total_amount').value) || 0;
        const gstRate = parseFloat(document.getElementById('gst_rate').value) || 0;
        const isInterstate = document.getElementById('is_interstate').checked;

        // Calculate tax amount based on GST rate
        const taxAmount = totalAmount * (gstRate / 100);

        let cgstRate = 0, sgstRate = 0, igstRate = 0;
        let cgstAmount = 0, sgstAmount = 0, igstAmount = 0;

        if (isInterstate) {
            // IGST applies
            igstRate = gstRate;
            igstAmount = taxAmount;
            cgstRate = 0;
            sgstRate = 0;
            cgstAmount = 0;
            sgstAmount = 0;
        } else {
            // CGST and SGST apply
            cgstRate = gstRate / 2;
            sgstRate = gstRate / 2;
            cgstAmount = taxAmount / 2;
            sgstAmount = taxAmount / 2;
            igstRate = 0;
            igstAmount = 0;
        }

        const netAmount = totalAmount + taxAmount;

        document.getElementById('tax_amount').value = taxAmount.toFixed(2);
        document.getElementById('cgst_rate').value = cgstRate.toFixed(2);
        document.getElementById('sgst_rate').value = sgstRate.toFixed(2);
        document.getElementById('igst_rate').value = igstRate.toFixed(2);
        document.getElementById('cgst_amount').value = cgstAmount.toFixed(2);
        document.getElementById('sgst_amount').value = sgstAmount.toFixed(2);
        document.getElementById('igst_amount').value = igstAmount.toFixed(2);
        document.getElementById('net_amount').value = netAmount.toFixed(2);
    }

    document.getElementById('total_amount').addEventListener('input', calculateGST);
    document.getElementById('gst_rate').addEventListener('change', calculateGST);
    document.getElementById('is_interstate').addEventListener('change', calculateGST);
    calculateGST(); // Run on page load to populate fields
</script>
@endsection