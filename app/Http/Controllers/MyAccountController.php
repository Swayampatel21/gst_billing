<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class MyAccountController extends Controller
{
    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.my_account.update', $data);
    }

    public function my_account_update(Request $request)
    {
        $user = request()->validate([
            'email' =>'required|unique:users,email,'.Auth::user()->id
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }

        if(!empty($request->file('profile_image')))
        {
            if(!empty($user->profile_image) && file_exists('upload/'.$user->
            profile_image)){
                unlink('upload/'.$user->profile_image);
            }

            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->profile_image = $filename; 
        }

        $user->save();
        return redirect('admin/my_account')->with('success', 'My Account Update');
    }
}