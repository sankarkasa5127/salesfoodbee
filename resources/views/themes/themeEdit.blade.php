@extends('layouts.master')
@section('content')
<div class="container-fluid">
<form action="{{route('theme_update',$theme->id)}}" method="post" enctype="multipart/form-data">
  @csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Banner Content</label>
  </div>
    <div class="row">
      <div class="col-lg-6">
        <input type="text" class="form-control" name="bannerTitle" placeholder="Title" aria-label="Title" value="{{$theme->bannerTitle}}">
      </div>
      <div class="col-lg-6 ">
        <input type="text" class="form-control" name="bannerSubTitle" placeholder="Sub-Title" aria-label="Sub-Title" value="{{$theme->bannerSubTitle}}">
      </div>

      <div class="col-lg-6 my-3">
        <input type="text" class="form-control" name="foodbeeLink" placeholder="FoodbeeLink" aria-label="foodbeeLink" value="{{$theme->foodbeeLink}}">
      </div>
      <div class="col-lg-6 my-3">
        <input type="text" class="form-control" name="districtCourt" placeholder="districtCourt" aria-label="districtCourt" value="{{$theme->districtCourt}}">
      </div>

      <div class="col-lg-12">
         <textarea class="form-control"  name="bannerContent" placeholder="Content" rows="5" aria-label="With textarea">{{$theme->bannerContent}}</textarea>
      </div>
    </div>



  <div class="mb-3 mt-5">
    <label for="exampleFormControlInput1" class="form-label">About Us</label>
    </div>
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" name="videolink" placeholder="Video links" aria-label="Title" value="{{$theme->videoLink}}">
        </div>
        <div class="col-lg-12 mt-3">
           <textarea class="form-control"  name="aboutUsContent" placeholder="Content" rows="5" aria-label="With textarea">{{$theme->aboutUsContent}}</textarea>
        </div>
      </div>

        <div class="mb-3 mt-5">
      <label for="exampleFormControlInput1" class="form-label">Why We Are The Best</label>
      </div>
        <div class="row">
          <div class="col-lg-12 mt-3">
             <textarea class="form-control" name="whyweeAreContent" placeholder="Content" rows="5" aria-label="With textarea">{{$theme->whyweeAreContent}}</textarea>
          </div>
        </div>

         <div class="mb-3 mt-5">
      <label for="exampleFormControlInput1" class="form-label">Customer Review </label>
      </div>
        <div class="row field_wrap">
         
          <div class="col-lg-4">
            <?php $names = explode("|",$theme->name);?>
              @foreach($names as $name)
            <input type="text" name="name[]" class="form-control" placeholder="name" aria-label="name" value="{{$name}}"><br>
             @endforeach
          </div>

          <div class="col-lg-6">
            <?php $review = explode("|",$theme->Review);?>
            @foreach($review as $rev)
            <textarea class="form-control" name="Review[]" placeholder="Content" rows="1" aria-label="With textarea">{{$rev}}</textarea><br>
             @endforeach
          </div>

          <div class="col-lg-2">
              <a href="javascript:void(0);" class="add_button btn btn-success">Add</a>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-6">
          <div class="mb-3 mt-5">
          <label for="exampleFormControlInput1" class="form-label">Social Media links</label>
          </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="facebook" class="form-control" placeholder="facebook" aria-label="facebook" value="{{$theme->facebook}}">
              </div>
              <div class="col">
                <input type="text" name="instagram" class="form-control" placeholder="instagram" aria-label="instagram" value="{{$theme->instagram}}">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="twitter" class="form-control" placeholder="Twitter" aria-label="Twitter" value="{{$theme->twitter}}">
              </div>
              <div class="col">
                <input type="text" name="youtube" class="form-control" placeholder="youtube" aria-label="youtube" value="{{$theme->youtube}}">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="indeed" class="form-control" placeholder="indeed" aria-label="indeed" value="{{$theme->indeed}}">
              </div>
              <div class="col">
                <input type="text" name="linkdin" class="form-control" placeholder="linkdin" aria-label="linkdin" value="{{$theme->linkdin}}">
              </div>
            </div>
          </div>

          <div class="col-lg-6">
          <div class="mb-3 mt-5">
          <label for="exampleFormControlInput1" class="form-label">Service's</label>
          </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="service1" class="form-control" placeholder="Title" aria-label="" value="{{$theme->service1}}">
              </div>
              <div class="col-lg-2">
               <img style="height: 38px;"  src="../public/img/icons/247.png">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="service2" class="form-control" placeholder="Title" aria-label="Twitter" value="{{$theme->service2}}">
              </div>
              <div class="col-lg-2">
                <img style="height: 38px;" src="../public/img/icons/img1.png">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="service3" class="form-control" placeholder="Title" aria-label="indeed" value="{{$theme->service3}}">
              </div>
              <div class="col-lg-2">
               <img style="height: 38px;" src="../public/img/icons/qult.png">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input  type="text" name="service4" class="form-control" placeholder="Title" aria-label="indeed" value="{{$theme->service4}}">
              </div>
              <div class="col-lg-2">
               <img style="height: 38px;" src="../public/img/icons/stepn.png">
              </div>
            </div>
          </div>

          </div>


           <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Contact Details </label>
      </div>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="email" placeholder="email" aria-label="Title" value="{{$theme->email}}">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="Phone_no" placeholder=" Phone no" aria-label="Sub-Title" value="{{$theme->Phone_no}}">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="whatsapp_no" placeholder="whatsapp no" aria-label="Sub-Title" value="{{$theme->whatsapp_no}}">
          </div>

          <div class="col">
            <input type="text" class="form-control" name="opening_time" placeholder="Opening Time" aria-label="Sub-Title" value="{{$theme->opening_time}}">
          </div>


          <div class="col-lg-12 mt-3">
             <input type="text" class="form-control" name="address" placeholder="Address"  aria-label="With textarea" value="{{$theme->address}}">
          </div>

          <div class="col-lg-12 mt-3">
             <input type="text" class="form-control" name="vatNumber" placeholder="vatNumber"  aria-label="With textarea" value="{{$theme->vatNumber}}">
          </div>

           <div class="col-lg-12 mt-3">
             <textarea class="form-control" name="googlemap" placeholder="Google map link" rows="5" aria-label="With textarea">{{$theme->maplink}}</textarea>
          </div>
        </div>

        <div class="row mt-3">
              <div class="col">
               <input type="submit" class="btn btn-success mb-5" name="submit" value="save"><br>
              </div>
            </div>
         
  </form>
</div>
 <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrap'); //Input field wrapper
    //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
      var fieldHTML ='<div  class="col-lg-4" id="text-'+x+'"><textarea class="form-control mt-3" name="name[]" placeholder="name" rows="1" aria-label="With textarea"></textarea></div><div class="col-lg-6" id="files-'+x+'"> <textarea class="form-control mt-3" name="Review[]" placeholder="Content" rows="1" aria-label="With textarea"></textarea></div><div class="col-lg-2" id="btndel-'+x+'"><a href="javascript:void(0);" class="remove_button btn btn-danger mt-3" data-rel="'+x+'">Delete</a></div>'; 
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $('body').on('click', '.remove_button', function(e){
        e.preventDefault();
       var thisvalue= $(this).attr('data-rel');
        $('#text-'+thisvalue).remove(); //Remove field html
        $('#files-'+thisvalue).remove(); //Remove field html
        $('#btndel-'+thisvalue).remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection