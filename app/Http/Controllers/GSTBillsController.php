<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartiesTypeModel;
use App\Models\GSTBillsModel;
use PDF;

class GSTBillsController extends Controller
{
    public function gst_bills(Request $request)
    {
        $data['getRecord'] = GSTBillsModel::getRecordAll($request);
        return view('admin.gst_bills.list', $data);
    }

    public function gst_bills_pdf_download($id)
    {
        $data['getRecordRow'] = GSTBillsModel::find($id);
        $data['title'] = "GST BILLING PDF";
        $data['date'] = date('m/d/Y');
        $pdf = PDF::loadView('GSTPDFSingle', $data);
        return $pdf->download('GSTBILLING.pdf');
    }

    public function gst_bills_download()
    {
        $getRecordAll = GSTBillsModel::select('gst_bills.*', 'parties_type.parties_type_name')
            ->join('parties_type', 'parties_type.id', '=', 'gst_bills.parties_type_id')
            ->get();

        $data = [
            'title' => 'GST BILLING',
            'date' => date('m/d/Y'),
            'getRecord' => $getRecordAll
        ];
        $pdf = PDF::loadView('GSTPDF', $data);
        return $pdf->download('GST.pdf');
    }

    public function gst_bills_add()
    {
        $data['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.gst_bills.add', $data);
    }

    public function gst_bills_insert(Request $request)
    {
        $request->validate([
            'parties_type_id' => 'required|integer',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|unique:gst_bills,invoice_no',
            'item_description' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
            'gst_rate' => 'required|numeric|in:5,12,18,28', // New validation for GST rate
            'is_interstate' => 'nullable|boolean',
            'declaration' => 'required|string',
        ]);

        // Get input values
        $total_amount = floatval(trim($request->total_amount));
        $gst_rate = floatval(trim($request->gst_rate));
        $is_interstate = $request->is_interstate ?? false;

        // Calculate tax amount based on GST rate
        $tax_amount = $total_amount * ($gst_rate / 100);

        // Define tax rates
        $cgst_rate = $is_interstate ? 0 : ($gst_rate / 2); // e.g., 9% for 18% GST intrastate
        $sgst_rate = $is_interstate ? 0 : ($gst_rate / 2); // e.g., 9% for 18% GST intrastate
        $igst_rate = $is_interstate ? $gst_rate : 0; // e.g., 18% for interstate

        // Calculate tax amounts
        if ($is_interstate) {
            $cgst_amount = 0;
            $sgst_amount = 0;
            $igst_amount = $tax_amount; // Entire tax amount is IGST
        } else {
            $cgst_amount = $tax_amount / 2; // Split tax amount equally
            $sgst_amount = $tax_amount / 2;
            $igst_amount = 0;
        }

        $net_amount = $total_amount + $tax_amount;

        $save = new GSTBillsModel;
        $save->parties_type_id = trim($request->parties_type_id);
        $save->invoice_date = trim($request->invoice_date);
        $save->invoice_no = trim($request->invoice_no);
        $save->item_description = trim($request->item_description);
        $save->total_amount = $total_amount;
        $save->cgst_rate = $cgst_rate;
        $save->sgst_rate = $sgst_rate;
        $save->igst_rate = $igst_rate;
        $save->cgst_amount = $cgst_amount;
        $save->sgst_amount = $sgst_amount;
        $save->igst_amount = $igst_amount;
        $save->tax_amount = $tax_amount;
        $save->net_amount = $net_amount;
        $save->declaration = trim($request->declaration);
        $save->save();

        return redirect('admin/gst_bills')->with('success', 'Record Inserted');
    }

    public function gst_bills_edit($id)
    {
        $data['getPartiesType'] = PartiesTypeModel::get();
        $data['getRecord'] = GSTBillsModel::find($id);
        return view('admin.gst_bills.edit', $data);
    }

    public function gst_bills_update($id, Request $request)
    {
        $request->validate([
            'parties_type_id' => 'required|integer',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|unique:gst_bills,invoice_no,' . $id,
            'item_description' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
            'gst_rate' => 'required|numeric|in:5,12,18,28', // New validation for GST rate
            'is_interstate' => 'nullable|boolean',
            'declaration' => 'required|string',
        ]);

        // Get input values
        $total_amount = floatval(trim($request->total_amount));
        $gst_rate = floatval(trim($request->gst_rate));
        $is_interstate = $request->is_interstate ?? false;

        // Calculate tax amount based on GST rate
        $tax_amount = $total_amount * ($gst_rate / 100);

        // Define tax rates
        $cgst_rate = $is_interstate ? 0 : ($gst_rate / 2); // e.g., 9% for 18% GST intrastate
        $sgst_rate = $is_interstate ? 0 : ($gst_rate / 2); // e.g., 9% for 18% GST intrastate
        $igst_rate = $is_interstate ? $gst_rate : 0; // e.g., 18% for interstate

        // Calculate tax amounts
        if ($is_interstate) {
            $cgst_amount = 0;
            $sgst_amount = 0;
            $igst_amount = $tax_amount; // Entire tax amount is IGST
        } else {
            $cgst_amount = $tax_amount / 2; // Split tax amount equally
            $sgst_amount = $tax_amount / 2;
            $igst_amount = 0;
        }

        $net_amount = $total_amount + $tax_amount;

        $save = GSTBillsModel::find($id);
        $save->parties_type_id = trim($request->parties_type_id);
        $save->invoice_date = trim($request->invoice_date);
        $save->invoice_no = trim($request->invoice_no);
        $save->item_description = trim($request->item_description);
        $save->total_amount = $total_amount;
        $save->cgst_rate = $cgst_rate;
        $save->sgst_rate = $sgst_rate;
        $save->igst_rate = $igst_rate;
        $save->cgst_amount = $cgst_amount;
        $save->sgst_amount = $sgst_amount;
        $save->igst_amount = $igst_amount;
        $save->tax_amount = $tax_amount;
        $save->net_amount = $net_amount;
        $save->declaration = trim($request->declaration);
        $save->save();

        return redirect('admin/gst_bills')->with('success', 'Record Updated');
    }

    public function gst_bills_delete($id)
    {
        $delete = GSTBillsModel::find($id);
        $delete->delete();
        return redirect('admin/gst_bills')->with('success', 'Record Deleted');
    }

    public function gst_bills_view($id)
    {
        $data['getRecord'] = GSTBillsModel::find($id);
        return view('admin.gst_bills.view', $data);
    }
}