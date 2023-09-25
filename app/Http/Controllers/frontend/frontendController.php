<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\category;
use App\Models\cateloge;
use App\Models\conllection;
use App\Models\latalogue;
use App\Models\post;
use App\Models\subcategory;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\CssSelector\Node\FunctionNode;

class frontendController extends Controller
{
    public function index(){

        $posts = post::all();
        $banner  = banner::all();

        $cateloges = cateloge::with('category')->get();
    
        //dd($categogs[0]->category->name);
       
        return view('frontend.index',compact('banner','posts','cateloges'));
    }

    public function shop(){

        $posts = post::all();
        $categries = category::all();

        return view('frontend.shop',compact('posts','categries'));
    }


    //single_shop//

    public function single_shop(){


        $postdata = post::all();
        return view('frontend.singleshop',compact('postdata'));

    }

    //Aboute page//

    public function about(){

        return view('frontend.about');
    }

    public function cart(){

            return view('frontend.cart');
        
        }

    public function contact(){

        return view('frontend.contact');
    }

     //frontend postdata search with JQUERY //

     public function search(Request $request){

        $post = post::where('title', 'LIKE', '%'. $request->search_text .'%')->get();

        if($post->count() == 0){

           return response('product not found!',404);

           exit;
        }

        $jsn = json_encode($post);
        return $jsn;
        
   }
}
