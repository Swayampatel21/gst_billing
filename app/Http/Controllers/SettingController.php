<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingModel;
use Str;
use File;


class SettingController extends Controller
{
    public function setting(Request $request)
    {
        $data['getRecord'] = SettingModel::find(1);
        return view('admin.setting.update', $data);
    }

    public function setting_update(Request $request)
    {
        $save = SettingModel::find(1);
        $save->web_name = trim($request->web_name);

        if(!empty($request->file('logo')))
        {
            if(!empty($save->profile_image) && file_exists('upload/'.$save->
            logo)){
                unlink('upload/'.$save->profile_image);
            }

            $file = $request->file('logo');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $save->logo = $filename; 
        }

        if(!empty($request->file('favicon')))
        {
            if(!empty($save->profile_image) && file_exists('upload/'.$save->
            favicon)){
                unlink('upload/'.$save->favicon);
            }

            $file = $request->file('favicon');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $save->favicon = $filename; 
        }

        $save->save();
        return redirect('admin/setting')->with('success', 'Setting Update');

    }
}