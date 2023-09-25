@extends('layouts.backend.backendapp')


@section('content')

<div class="row">
    <div class="col-lg-6" style="margin: auto">


        @isset($subcategory)

        <div class="card">
            <div class="header"><h1>Add subcategory</h1></div>
             
             <div class="card-body">
         
                 <form action="{{ route('subcategory.update', $subcategory) }}" method="POST">
                     @csrf
                     @method('post')
                   <div>
                    <label for="title">title</label>
                     <input required type="text" value="{{ $subcategory->name }}" name="title" placeholder="title" class="form-control">

                    </div>
                   <div>
                    <label for="slug">slug</label>
                     <input required type="text" value="{{ $subcategory->slug }}" name="slug" placeholder="slug" class="form-control">
                    <br>
                   </div>

                   <select class="form-select" value="{{ $subcategory->category_id }}" name="category_id" aria-label="Default select example">
                    <option hidden selected disabled>Open this select menu</option>
                   @forelse ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                   @empty
                       <h1 style="color: red">no category</h1>
                   @endforelse
                  </select>
                  @error('category_id')
                  <div><span style="color: red">{{ $message }}</span></div>
              @enderror
                  <br>
                   <button class="btn btn-primary" type="submit">update</button>
             </form>
             </div>    
             
         </div>
    </div>


        @else

        <div class="card" style="margin: auto">
            <div class="header"><h1>Add subcategory</h1></div>
             
             <div class="card-body">
         
                 <form action="{{ route('subcategory.store') }}" method="POST">
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

                   <select class="form-select" name="category_id" aria-label="Default select example">
                    <option hidden selected disabled>Open this select menu</option>
                   @forelse ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                   @empty
                       <h1 style="color: red">no category</h1>
                   @endforelse
                  </select>
                  <br>
                   <button class="btn btn-primary" type="submit">submit</button>
             </form>
             </div>    
             
         </div>
    </div>
        @endisset

    
   <div class="card" style="margin:auto; margin-top:20px;">
    <div class="card-hader">All subcategory</div>
    <div class="card-body">
        <table class="table">

            <tr>
                <th>Id</th>
                <th> subcategory_name</th>
                <th> slug</th>
                <th> category_name</th>
                <th> category_id</th>
                <th> product_count</th>
                <th> Action</th>
            </tr>
        
            @forelse ($subcategories as $key => $sdata)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $sdata->name }}</td>
                    <td>{{ $sdata->slug }}</td>
                    <td>{{ $sdata->category->name }}</td>
                    <td>{{ $sdata->category_id }}</td>
                    <td>{{ $sdata->sub_porduct_count }}</td>
                    <td>
                            <a class="btn btn-danger" href="">delet</a>
                            <a class="btn btn-primary" href="{{ route('subcategory.edit', $sdata) }}">edit</a>
                    </td>
                </tr>
            @empty
                
            @endforelse
           </table>
    </div>
   </div>


</div>


@endsection