@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
     <form action="{{route('menu_update',$MenuCard->id)}}" method="post">
      @csrf
       <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product name</label>
          <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp" value='{{$MenuCard->product_name}}'>
      </div>

      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Discription</label>
          <input type="text" class="form-control" name="product_discription" id="exampleInputEmail1" aria-describedby="emailHelp" value='{{$MenuCard->product_discription}}'>
      </div>

      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Price</label>
          <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" aria-describedby="emailHelp" value='{{$MenuCard->product_price}}'>
      </div>


      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Select Category</label>
          <select class="form-select form-control" aria-label="Default select example" name="category_name">
            <option selected>select category</option>
            @foreach($cat as $category)
            <option value="{{$category->category_name}}"  {{$MenuCard->category_name  == $category->category_name ? 'selected="selected"' : '' }}">{{$category->category_name}}</option>
            @endforeach
          </select>
      </div>

       <button type="submit" class="btn btn-primary">Submit</button>
     </form>
    </div>
    
   
  </div> 



</div>


@endsection