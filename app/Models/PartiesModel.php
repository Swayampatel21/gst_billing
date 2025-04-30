<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class PartiesModel extends Model
{
    use HasFactory;

    protected $table = 'parties';

    protected $fillable = [
        'parties_type_id',
        'full_name',
        'phone_no',
        'email',
        'account_holder_name',
        'account_no',
        'bank_name',
        'ifsc_code',
        'branch_address',
    ];

    static public function getRecordAll()
    {
        $return = self::select('parties.*', 'parties_type.parties_type_name')
            ->join('parties_type', 'parties_type.id', 'parties.parties_type_id');

        if (!empty(Request::get('id'))) {
            $return = $return->where('parties.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('parties_type_name'))) {
            $return = $return->where('parties_type.parties_type_name', 'like', '%' . Request::get('parties_type_name') . '%');
        }

        if (!empty(Request::get('full_name'))) {
            $return = $return->where('parties.full_name', 'like', '%' . Request::get('full_name') . '%');
        }

        if (!empty(Request::get('phone_no'))) {
            $return = $return->where('parties.phone_no', 'like', '%' . Request::get('phone_no') . '%');
        }

        if (!empty(Request::get('created_at'))) {
            $return = $return->where('parties.created_at', 'like', '%' . Request::get('created_at') . '%');
        }

        $return = $return->paginate(5);
        return $return;
    }

    static public function singleGetRecord($id)
    {
        return self::find($id);
    }

    public function get_parties_type_sigle()
    {
        return $this->belongsTo(PartiesTypeModel::class, 'parties_type_id');
    }
}