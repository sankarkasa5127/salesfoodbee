@extends('layouts.master')
@section('content')
<style type="text/css">
  .addcontent{
    text-align: right;
    display: flex;
    justify-content: end;
      margin-right: 24px;
  }
</style>

<div class="row mt-4 addcontent">
  <a class="btn btn-info" href="{{route('web_img_form')}}">ADD Image</a>
</div>
<div class="container-fluid">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Restaurant Id</th>
      <th scope="col">logo</th>
      <th scope="col">banner</th>
      <th scope="col">About-US</th>
      <th scope="col">why we are best Img</th>
      <th scope="col">Book Table</th>
      <th scope="col">Testimonials </th>
      <th scope="col">Gallery </th>
      <th scope="col">Action</th>
      <th scope="col">Compress Images</th>

    </tr>
  </thead>
  <tbody>
  	@foreach($webimg as $img)
  	<?php $user = Session::get('user'); ?>
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$img->restaurant_id}}</td>
      <td><img height="50px" width="50px" src="{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $img->logoimg) }}"/></td>
      <td><img height="50px" width="50px" src="{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $img->bannerimg) }}"/></td>
      <td>
      <?php $aboutus = explode("|",$img->aboutusimage);?>
      @foreach($aboutus as $about)
      <img height="50px" width="50px" src="{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $about) }}"/>
      @endforeach
    </td>
    <td>
      <?php $whyweare = explode("|",$img->whyweareimage);?>
      @foreach($whyweare as $whywe)
      <img height="50px" width="50px" src="{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $whywe) }}"/>
      @endforeach
    </td>
    <td>
      <?php $BookTable = explode("|",$img->BookTableimage);?>
      @foreach($BookTable as $Book)
      <img height="50px" width="50px" src="{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $Book) }}"/>
      @endforeach
    </td>
     <td>
      <?php $Testimonials = explode("|",$img->Testimonialsimage);?>
      @foreach($Testimonials as $Test)
      <img height="50px" width="50px" src="{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $Test) }}"/>
      @endforeach
    </td>
    <td>
      <?php $gallery = explode("|",$img->galleryimage);?>
      @foreach($gallery as $gall)
      <img height="50px" width="50px" src="{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $gall) }}"/>
      @endforeach
    </td>

    <td>
        <a class="btn btn-primary m-1" href="{{url('web-img-edit')}}/{{$img->id}}">Edit</a>
        <a class="btn btn-danger" href="{{route('web_img_delete',$img->id)}}">delete</a>
    </td>

       <td> 
          <a class="btn btn-danger" href="{{route('compress_img')}}">Compress & Download</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection