@extends('layouts.backend.backendapp')


@section('content')

<div class="row">
    <div class="col-lg-6" style="margin: auto">

    @isset($data)
       
    <div class="card">
        <div class="header"><h1>edit category</h1></div>
         
         <div class="card-body">
     
             <form action="{{ route('category.store') }}" method="POST">
                 @csrf
                 @method('post')
               <div>
                <label for="title">title</label>
                 <input type="text" value="{{ $data->name }}" name="title" placeholder="title" class="form-control">
               </div>
               <div>
                <label for="slug">slug</label>
                 <input type="text" value="{{ $data->slug }}" name="slug" placeholder="slug" class="form-control">
                <br>
               </div>
               <button class="btn btn-primary" type="submit">submit</button>
         </form>
         </div>    
         
     </div>

        @else


        <div class="card" style="margin: auto">
            <div class="header"><h1>Add category</h1></div>
             
             <div class="card-body">
         
                 <form action="{{ route('category.store') }}" method="POST">
                     @csrf
                     @method('post')
                   <div>
                    <label for="title">title</label>
                     <input type="text" name="title" placeholder="title" class="form-control">
                   </div>
                   <div>
                    <label for="slug">slug</label>
                     <input type="text" name="slug" placeholder="slug" class="form-control">
                    <br>
                   </div>
                   <button class="btn btn-primary" type="submit">submit</button>
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
                    <th>Category_name</th>
                    <th>Category_slug</th>
                    <th>Subcategory_count</th>
                    <th>product_count</th>
                    <th>Action</th>

                   </tr>
                   @forelse ($categories as $key => $category)
                       <tr>
                       <td>{{ $key }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->subcategory_count }}</td>
                        <td>{{ $category->category_product_count }}</td>
                        <td>
                            <a class="btn btn-danger" href="">delete</a>
                            <a class="btn btn-primary" href="{{ route('category.edit', $category) }}">edit</a>
                        </td>
                       </tr>
                   @empty
                       
                   @endforelse
                  </table>
                
             </div>    
             
         </div>
    </div>



@endsection