<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    
    public function index(){
        return view('backend.setting.setting')->with('setting',Setting::first());
    }

    
    public function store(Request $request){
        $request->validate([
            'logo'=>'required',
            'facebook'=>'nullable|url',
            'twitter'=>'nullable|url',
            'email'=>'nullable|email',
            'phone'=>'nullable|numeric',
            'address'=>'nullable'
        ]);

        $logo_new_name="";
        if($request->has('logo')){
            $logo =$request->logo;
            $logo_new_name= time().$logo->getClientOriginalName();
            $logo->move('upload',$logo_new_name);

        }

        Setting::where('id',1)->update(['logo'=>$logo_new_name,'facebook'=>$request->facebook,'twitter'=>$request->twitter,'email'=>$request->email,'phone'=>$request->phone,'address'=>$request->phone]);

        session()->flash('success','Your setting is updated successfully!');
        
        return redirect()->back();

        
    }
}
