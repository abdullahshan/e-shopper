@extends('layouts.backend.backendapp')


@section('content')

<div class="row">
    <div class="col-lg-6" style="margin: auto">

    @isset($post_data)
       
    <div class="card">
        <div class="header"><h1>edit category</h1></div>
         
         <div class="card-body">
     
          
             
         </div>    
         
     </div>

        @else


        <div class="card" style="margin: auto">
            <div class="header"><h1>Add collection</h1></div>
             
             <div class="card-body">
         
                <form action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="row">
                        <div class="col-lg-6">
                            <select class="form-select col-lg-2" name="category_id" aria-label="Default select example">
                                <option hidden selected disabled>category</option>
                                
                                @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    
                                @endforelse
                              
                              </select>
                        </div>
                       
                    </div>
                    
                  
                    <label for="image">image</label>
                    <input type="file" name="image" placeholder="title"class="form-control">
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
             </div>    
             
         </div>
    @endisset
    
    </div>

        <div class="card" style="margin: auto; margin-top:20px;">
            <div class="header"><h1>All catalogue</h1></div>
             
             <div class="card-body">
                
                <table class="table">
                   <tr>
                    <th>Id</th>
                    <th>category_name</th>
                    <th>image</th>
                    <th>Action</th>

                   </tr>
                 
                   @forelse ($collections as $key => $collenciton)
                       <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $collenciton->category->name }}</td>
                        <td>{{ $collenciton->image }}</td>
                        <td>
                            <a class="btn btn-primary" href="">edit</a>
                            <a class="btn btn-danger" href="">delete</a>
                        </td>
                       </tr>
                   @endforeach
                  
                  </table>
                
             </div>    
             
         </div>
    </div>



@endsection