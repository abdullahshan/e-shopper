<?php

namespace App\Http\Controllers\backend;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function add(){

        $categories = category::with('subcategories')->get();
      
        return view('category.addcategory',compact('categories'));

    }

    public function store(Request $request){

        $data = new category();
        $data->name = $request->title;
        $data->slug  = $this->genarateslug($request->title, $request->slug);
        $data->save();
        return back();
        
    }


    public function edit(category $category){

        $data = $category;

        $categories = category::all();
        return view('category.addcategory',compact('categories','data'));


    }





private function genarateslug($title, $slug){

        if($slug == null){

            $newslug = Str::slug($title);
        }else{

            $newslug = Str::slug($slug);
        }

        $slug = category::where('slug','LIKE',"%{$newslug}%")->get();

        $count = count($slug);
        if($count > 0){

            $count = $newslug . $count++;

            return $count;
        }else{

            return $newslug;
        }
       
    }
}
