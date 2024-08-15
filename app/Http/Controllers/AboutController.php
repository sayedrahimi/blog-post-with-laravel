<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index(){
        return view('backend.About.about')
                ->with('posts',About::first());
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'description'=>'required'
        ]);

        About::where('id',1)
        ->update(['title'=>$request->title,'sub_title'=>$request->sub_title,'description'=>$request->description]);

        return redirect()->route('about');
    }

    public function frontendIndex(){
        return view('frontend.about')
            ->with('about',About::first());
    }
}
