<?php

namespace App\Http\Controllers\backend;

use App\Models\category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subcategoryController extends Controller
{
    public function add(){

        $categories = category::all();
        $subcategories = subcategory::with('category')->get();

        return view('subcategory.addsubcategory',compact('categories','subcategories'));
    }

    public function store(Request $request){

        $data = new subcategory();
        $data->name = $request->title;
        $data->slug  = $this->genarateslug($request->title, $request->slug);
        $data->category_id = $request->category_id;

        category::where('id',$request->category_id)->increment('subcategory_count',1);
        
        $data->save();



        return back();
    }

    public function edit(subcategory $subcategory){

           $subcategory = $subcategory;
           $categories = category::all();
           $subcategories = subcategory::all();
           return view('subcategory.addsubcategory',compact('subcategory','categories','subcategories'));

    }


    public function update(Request $request, subcategory $subcategory){

        $request->validate([

            'title' => 'required',
            'slug'  => 'required',
            'category_id' => 'required',

        ],[


            'category_id' => "select a category",

        ]
    );
        
        
        $subcategory->name = $request->title;
        $subcategory->slug = $this->genarateslug($request->title, $request->slug);
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return redirect()->route('subcategory.add');
    }



    private function genarateslug($title, $slug){

        if($slug == null){

            $newslug = Str::slug($title);
        }else{

            $newslug = Str::slug($slug);
        }

        $slug = subcategory::Where('slug','Like',"%{$newslug}%")->get();

        $count = count($slug);

        if($count > 0){

            $count = $newslug.$count++;

            return $count;
        }else{

            return $newslug;
        }
    }
}
