@extends('layouts.backend.backendapp')


@section('content')

<div class="row">
    <div class="col-lg-6" style="margin: auto">

    @isset($post_data)
       
    <div class="card">
        <div class="header"><h1>edit category</h1></div>
         
         <div class="card-body">
     
            <form action="{{ route('post.update', $post_data) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')

                <label for="title">Title</label>
                <input type="text" value="{{ $post_data->title }}" name="title" placeholder="title"class="form-control">
                <label for="description">description</label>
                <input type="text" value="{{ $post_data->description }}" name="description" placeholder="title"class="form-control">
                <label for="price">price</label>
                <input type="text" value="{{ $post_data->price }}" name="price" placeholder="title"class="form-control">
               
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
                    <div class="col-lg-6">
                        <select class="form-select col-lg-2" name="subcategory_id" aria-label="Default select example">
                            <option hidden selected disabled>sub_category</option>
                          
                              @forelse ($subcategories as $subcategory)
                              <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                              @empty
                                  
                              @endforelse
                          
                          </select>
                    </div>
                   
                </div>
                
              
                <label for="image">image</label>
                <input type="file" value="{{ $post_data->image }}" name="image" placeholder="title"class="form-control">
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
             
         </div>    
         
     </div>

        @else


        <div class="card" style="margin: auto">
            <div class="header"><h1>Add category</h1></div>
             
             <div class="card-body">
         
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="title"class="form-control">
                    <label for="description">description</label>
                    <input type="text" name="description" placeholder="title"class="form-control">
                    <label for="price">price</label>
                    <input type="text" name="price" placeholder="title"class="form-control">
                   
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
                        <div class="col-lg-6">
                            <select class="form-select col-lg-2" name="subcategory_id" aria-label="Default select example">
                                <option hidden selected disabled>sub_category</option>
                              
                                  @forelse ($subcategories as $subcategory)
                                  <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
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
            <div class="header"><h1>All category</h1></div>
             
             <div class="card-body">
                
                <table class="table">
                   <tr>
                    <th>Id</th>
                    <th>category_id</th>
                    <th>subcategory_id</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>description</th>
                    <th>price</th>
                    <th>image</th>
                    <th>Action</th>

                   </tr>
                  @foreach ($posts as $key => $post)
                      <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $post->category_id }}</td>
                        <td>{{ $post->subcategory_id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->price }}</td>
                        <td><img style="max-height: 100px" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('post.edit', $post) }}">edit</a>
                            <a class="btn btn-danger" href="{{ route('post.delete', $post) }}">delete</a>
                        </td>

                      </tr>
                  @endforeach
                  
                  </table>
                
             </div>    
             
         </div>
    </div>



@endsection