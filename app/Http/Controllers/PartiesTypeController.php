<?php

namespace App\Http\Controllers;
use App\Mail\GSTBillGenerated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PartiesTypeModel;
use App\Models\PartiesModel;
use PDF;

class PartiesTypeController extends Controller
{
    public function parties_type(Request $request)
    {
        $data['getRecord'] = PartiesTypeModel::getRecordAll($request);
        return view('admin.parties_type.list', $data);
    }

    public function parties_type_pdf_generator()
{
    $getRecordAll = PartiesTypeModel::get();
    $data = [
        'title' => 'GST BILL PDF',
        'date' => date('m/d/Y'),
        'parties' => $getRecordAll
    ];

    // Generate PDF
    $pdf = PDF::loadview('PartiesTypePDF', $data);

    // Get logged-in user details
    $user = Auth::user();
    $userName = $user->name ?? 'User';
    $userEmail = $user->email ?? 'admin@example.com'; // fallback

    // Send email with PDF attached
    Mail::to($userEmail)->send(new GSTBillGenerated($userName, date('d-m-Y'), $pdf->output()));

    // Download the PDF
    return $pdf->download('gstbilling.pdf');
}

    public function parties_type_pdf_single($id)
    {
        $data['getSingleRecord'] = PartiesTypeModel::find($id);
        $data['title'] = "GST BILL PDF";
        $pdf = PDF::loadview('PartiesTypePDFSingle', $data);
        return $pdf->download('gstbilling.pdf');
    }

    public function parties_type_add()
    {
        return view('admin.parties_type.add');
    }

    public function parties_type_insert(Request $request)
    {
            $save = request()->validate([
                  'parties_type_name' => 'required'
            ]);

          $save =  new PartiesTypeModel;
          $save->parties_type_name =  trim($request->parties_type_name);
          $save->save();

          return redirect('admin/parties_type')->with('success', 'Record Insert');
    }

    public function parties_type_edit($id, Request $request)
    {
        //$data['getRecord'] = PartiesTypeModel::find($id);
        $data['getRecord'] = PartiesTypeModel::singleGetRecord($id);
        return view('admin.parties_type.edit', $data);
    }

    public function parties_type_update($id, Request $request)
    {
        //dd($request->all());
        $save =  PartiesTypeModel::singleGetRecord($id);
        $save->parties_type_name = trim($request->parties_type_name);
        $save->save();

        return redirect('admin/parties_type')->with('success', 'Record Update');
    }

    public function parties_type_delete($id)
    {
        $delete =  PartiesTypeModel::singleGetRecord($id);
        $delete->delete();
        return redirect('admin/parties_type')->with('success', 'Record Deleted');
    }

    public function parties(Request $request)
    {
        $data['getRecord'] = PartiesModel::getRecordAll($request);
        return view('admin.parties.list', $data);
    }

    public function parties_view_single($id)
    {
        $data['getRecord'] = PartiesModel::find($id);
        return view('admin.parties.view' , $data);
    }


    public function parties_pdf_single_download($id)
    {
        $data['getSingleRecord'] = PartiesModel::find($id);

        $data['title'] = "GST BILLING PDF";
        $data['date'] = date('m/d/Y');
         $pdf = PDF::loadview('PartiesPDFSingle' , $data);
         return $pdf->download('GSTBilling.pdf');
    }

    public function parties_pdf_download()
    {
       // $getRecordAll = PartiesModel::get();
       $getRecordAll = PartiesModel::select('parties.*', 'parties_type.parties_type_name')
       ->join('parties_type', 'parties_type.id', '=', 'parties.parties_type_id' )
       ->get();


        $data = [
            'title' => 'GST BILLING',
            'date' => date('m/d/Y'),
            'parties' =>  $getRecordAll

        ];
        $pdf = PDF::loadview('PartiesPDF', $data);
        return $pdf->download('GSTBill.pdf');
    }

    public function parties_add()
    {
        $data['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.parties.add', $data);
    }

    public function parties_insert(Request $request)
    {
       // dd($request->all());
       $save = new PartiesModel;
        $save->parties_type_id = trim($request->parties_type_id);
        $save->full_name = trim($request->full_name);
        $save->phone_no = trim($request->phone_no);
        $save->email = trim($request->email);
        $save->account_holder_name = trim($request->account_holder_name);
        $save->account_no = trim($request->account_no);
        $save->bank_name = trim($request->bank_name);
        $save->ifsc_code = trim($request->ifsc_code);
        $save->branch_address = trim($request->branch_address);
        $save->save();
        return redirect('admin/parties')->with('success', 'Record Insert');
    }

    public function parties_edit($id, Request $request)
    {
        $data['getRecord'] = PartiesModel::singleGetRecord($id);
        $data['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.parties.edit', $data);
    }

    public function parties_update($id, Request $request)
    {
        $save =  PartiesModel::singleGetRecord($id);
        $save->parties_type_id = trim($request->parties_type_id);
        $save->full_name = trim($request->full_name);
        $save->phone_no = trim($request->phone_no);
        $save->address = trim($request->address);
        $save->account_holder_name = trim($request->account_holder_name);
        $save->account_no = trim($request->account_no);
        $save->bank_name = trim($request->bank_name);
        $save->ifsc_code = trim($request->ifsc_code);
        $save->branch_address = trim($request->branch_address);
        $save->save();
        return redirect('admin/parties')->with('success', 'Record Update');
    }

    public function parties_delete($id, Request $request)
    {
        $delete =  PartiesModel::singleGetRecord($id);
        $delete->delete();
        return redirect('admin/parties')->with('success', 'Record Deleted');
    }

    public function sendGSTBillCheckEmail()
{
    // Get a default user (e.g., first user or fallback)
    $user = User::first() ?? (object) ['name' => 'User', 'email' => 'admin@example.com'];

    // Send email
    try {
        Mail::to($user->email)->send(new GSTBillCheckEmail($user->name, date('d-m-Y')));
        return response()->json(['status' => 'success', 'message' => 'Email sent to ' . $user->email]);
    } catch (\Exception $e) {
        \Log::error('GST Bill Check Email Failed: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'Failed to send email'], 500);
    }
}
}