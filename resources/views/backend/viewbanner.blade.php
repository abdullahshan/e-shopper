@extends('layouts.backend.backendapp')


@section('content')

<div class="row">

    @isset($single_banner)

    <div class="col-lg-6" style="margin: auto">
       
    <div class="card">
         <div class="card-body">
  
     <form action="{{ route('banner.update', $single_banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')

        <label for="title">Title</label>
        <input type="text" value="{{ $single_banner->title }}" name="title" placeholder="title"class="form-control @error('title') is-invalid @enderror">
       
        <label for="description">description</label>
        <input type="text" value="{{ $single_banner->description }}" name="description" placeholder="title"class="form-control">
        <label for="image">image</label>
        <input type="file" name="image" placeholder="title"class="form-control">
        <button type="submit" class="btn btn-primary">submit</button>
    </form>

           
         </div>    
         
     </div>
    
    </div>

    @endisset

        <div class="card" style="margin: auto; margin-top:20px;">
            <div class="header"><h1>All banner</h1></div>
             
             <div class="card-body">
                
                <table class="table">
                   <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>image</th>
                    <th>Action</th>
                   </tr>
                  
                   @foreach ($banner as $key => $s_banner)
                       <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $s_banner->title }}</td>
                        <td>{{ $s_banner->description }}</td>
                        <td><img style="max-height: 100px" src="{{ asset('storage/' . $s_banner->image) }}" alt="{{ $s_banner->title }}"></td>
                        <td>
                           <a class="btn btn-primary" href="{{ route('banner.edit', $s_banner) }}">edit</a>
                        </td>
                       </tr>
                   @endforeach
                  </table>
                
             </div>    
             
         </div>
    </div>



@endsection