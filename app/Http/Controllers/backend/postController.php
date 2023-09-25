<?php

namespace App\Http\Controllers\backend;

use App\Models\post;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Mime\Part\File;
use Illuminate\Support\Facades\Storage;

class postController extends Controller
{
    public function add(){

        $categories = category::all();
        $subcategories = subcategory::all();
        $posts = post::all();

        return view('backend.addpost',compact('categories','subcategories','posts'));
    }

    public function store(Request $request){

           $post = new post();

           $post->title = $request->title;
           $post->slug =   $this->genarateslug($request->title);
           $post->description = $request->description;
           $post->price = $request->price;
           $post->category_id = $request->category_id;
           $post->subcategory_id = $request->subcategory_id;
           if ($request->hasFile('image')) {

            $post->image = $this->upload_image($request);
    
            }
            category::where('id',$request->category_id)->increment('category_product_count',1);

            $post->save();

           return back();
          
    }


public function edit(post $post){

        //dd($post);

        $post_data = $post;
        $categories = category::all();
         $subcategories = subcategory::all();
            $posts = post::all();

        return view('backend.addpost',compact('categories','subcategories','posts','post_data'));

}

public function update(Request $request, post $update){

    $post_singdata = $update;

        $post_singdata->title = $request->title;
        $post_singdata->slug =   $this->genarateslug($request->title);
        $post_singdata->description = $request->description;
        $post_singdata->price = $request->price;
        $post_singdata->category_id = $request->category_id;
        $post_singdata->subcategory_id = $request->subcategory_id;

        if ($request->hasFile('image')) {

            $post_singdata->image = $this->upload_image($request);
    
            }else{

                $post_singdata->image = $post_singdata->image;
            }

            $post_singdata->save();


            return back();

}



//delete post//

public function delete(post $delete){

    $image = $delete->image;

    $path = "storage/".$image;

    if(File_exists($path)){
        unlink($path);
      }
       $delete_data = $delete;

       $delete_data->delete();

       return back();

}







    
//privaat function  for image upload or insert //

    private function upload_image($request){

        if ($request->hasFile('image')) {
            $ext = $request->image->extension();
        $filename = $this->genarateslug($request->title).'.'.$ext;
        $upload_image =   $request->image->storeAs('upload',$filename, 'public');

        return $upload_image;
    
        }
       
    }
    

private function genarateslug($title){

   
        $newslug = Str::slug($title);

        return $newslug;
   
}


}
