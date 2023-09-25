<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Faker\Core\Barcode;
use Illuminate\Http\Request;

class bannerController extends Controller
{

    public function view(){

        $banner = banner::all();
        return view('backend.viewbanner',compact('banner'));
    }


public function edit(banner $edit){


        $banner = banner::all();
        $single_banner = $edit;

        return view('backend.viewbanner',compact('single_banner','banner'));

}

public function update(Request $request,banner $update){


        $data = $update;

        $data->title = $request->title;
        $data->description = $request->description;

        if($request->hasFile('image')){

            $file_ext = $request->image->extension();
            $file_name = $request->title.'.'.$file_ext;

          $update =  $request->image->storeAs('upload',$file_name,'public');

            $data->image = $update;

        }

        $data->save();

        return back();
       
}

}
