@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-8">
     <form action="{{route('menu_product')}}" method="post">
      @csrf
       <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product name</label>
          <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>

      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Discription</label>
          <input type="text" class="form-control" name="product_discription" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>

      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Price</label>
          <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>


      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Select Category</label>
          <select class="form-select form-control" aria-label="Default select example" name="category_name" required>
            <option selected>select category</option>
            @foreach($cat as $category)
            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endforeach
          </select>
      </div>

       <button type="submit" class="btn btn-primary">Submit</button>
     </form>
    </div>
    <div class="col-4">
     <form action="{{route('menu_category')}}" method="post">
      @csrf
       <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category name</label>
          <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>
       <button type="submit" class="btn btn-primary">Submit</button>
     </form>
    </div>
   
  </div>

<div class="row mt-5">
    <div class="col-12">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($MenuCard as $product)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$product->product_name}}</td>
      <td>{{$product->product_discription}}</td>
      <td>{{$product->product_price}}</td>
      <td>{{$product->category_name}}</td>
      <td>
        <a class="btn btn-warning" href="{{route('menu_edit',$product->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('menu_delete',$product->id)}}">Delete</a>
    
      </td>
      
    </tr>
    @endforeach
    
  </tbody>
</table>
    </div>
</div>



</div>


@endsection