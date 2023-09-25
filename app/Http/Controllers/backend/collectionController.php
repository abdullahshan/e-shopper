<?php

namespace App\Http\Controllers\backend;

use App\Models\category;
use App\Models\latalogue;
use App\Models\conllection;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use App\Models\cateloge;
use PHPUnit\TestRunner\TestResult\Collector;

class collectionController extends Controller
{
    public function add(){

        $categories = category::all();

        $collections  = cateloge::with('category')->get();

        return view('backend.collectionadd',compact('categories','collections'));
    }

    public function store(Request $request){


        $data = new cateloge();
        $data->category_id = $request->category_id;

        if($request->hasFile('image')){

            $ext = $request->image->extension();

           $file_name = uniqid() . '.' . $ext;

           $upload = $request->image->storeAs('upload',$file_name,'public');

            $data->image = $upload;
        }
            
            $data->save();

            return back();
            
    }
}
