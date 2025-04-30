<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PartiesTypeModel extends Model
{
    use HasFactory;

    protected $table = 'parties_type';


    static public function getRecordAll($request)
    {
        $return = self::select('parties_type.*');

        //search box
            if(!empty(Request::get('id')))
            {
                $return = $return->where('parties_type.id', '=', Request::get('id'));
            }

            if(!empty(Request::get('parties_type_name')))
            {
                $return =  $return->where('parties_type.parties_type_name', 'like',
                '%' .Request::get('parties_type_name').'%');
            }

            if(!empty(Request::get('created_at')))
            {
                $return =  $return->where('parties_type.created_at', 'like',
                '%' .Request::get('created_at').'%');
            }

            if(!empty(Request::get('updated_at')))
            {
                $return =  $return->where('parties_type.updated_at', 'like',
                '%' .Request::get('updated_at').'%');
            }
        //search box end

        $return = $return->paginate(3);
        return $return;
    }
        static public function singleGetRecord($id)
        {
            return self::find($id);
        }

        
}