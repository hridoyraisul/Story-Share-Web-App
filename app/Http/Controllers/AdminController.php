<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginAdmin(Request $request){
        $admin = Admin::where('email',$request->email)->first();
        if ($admin){
            if (Hash::check($request->password, $admin->password)){
                    session([
                        'admin_id' => $admin->id,
                        'admin_name'=> $admin->name,
                        'admin_email' => $admin->email,
                    ]);
                    return view('admin.home',compact('admin'));
            }
            else{
                return redirect()->back()->with('error_message','Wrong Password');
            }
        }
        else{
            return redirect()->back()->with('error_message','Invalid Email Address');
        }
    }
}
