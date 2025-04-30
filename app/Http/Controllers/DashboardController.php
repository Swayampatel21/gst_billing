<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\PartiesTypeModel;
use App\Models\PartiesModel;
use App\Models\GSTBillsModel;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::User()->is_role == 1)
        {
            $data['PartiesType'] = PartiesTypeModel::count();
            $data['Parties'] = PartiesModel::count();
            $data['GSTBills'] = GSTBillsModel::count();
            return view('admin.dashboard' , $data);
        }
        
    }
}