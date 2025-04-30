<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class GSTBillsModel extends Model
{
    use HasFactory;

    protected $table = 'gst_bills';

    protected $fillable = [
        'parties_type_id',
        'invoice_date',
        'invoice_no',
        'item_description',
        'total_amount',
        'cgst_rate',
        'sgst_rate',
        'igst_rate',
        'cgst_amount',
        'sgst_amount',
        'igst_amount',
        'tax_amount',
        'net_amount',
        'declaration',
    ];

    static public function getRecordAll($request)
    {
        $return = self::select('gst_bills.*', 'parties_type.parties_type_name')
            ->join('parties_type', 'parties_type.id', 'gst_bills.parties_type_id');

        if (!empty(Request::get('id'))) {
            $return = $return->where('gst_bills.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('parties_type_name'))) {
            $return = $return->where('parties_type.parties_type_name', 'like', '%' . Request::get('parties_type_name') . '%');
        }

        if (!empty(Request::get('invoice_date'))) {
            $return = $return->where('gst_bills.invoice_date', 'like', '%' . Request::get('invoice_date') . '%');
        }

        if (!empty(Request::get('invoice_no'))) {
            $return = $return->where('gst_bills.invoice_no', 'like', '%' . Request::get('invoice_no') . '%');
        }

        if (!empty(Request::get('total_amount'))) {
            $return = $return->where('gst_bills.total_amount', 'like', '%' . Request::get('total_amount') . '%');
        }

        $return = $return->paginate(20);
        return $return;
    }

    public function party()
    {
        return $this->belongsTo(PartiesModel::class, 'parties_type_id', 'parties_type_id');
    }

    public function get_parties_type_name()
    {
        return $this->belongsTo(PartiesTypeModel::class, 'parties_type_id');
    }
}