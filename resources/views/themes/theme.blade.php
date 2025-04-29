@extends('layouts.master')
@section('content')

<div class="container-fluid">
<form action="{{route('theme_save')}}" method="post" enctype="multipart/form-data">
  @csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Banner Content</label>
  </div>
    <div class="row">
      <div class="col-lg-6">
        <input type="text" class="form-control" name="bannerTitle" placeholder="Title" aria-label="Title" required>
        @if($errors->has('bannerTitle'))
            <span style="color:red;">{{ $errors->first('bannerTitle') }}</span>
        @endif
      </div>
      <div class="col-lg-6">
        <input type="text" class="form-control" name="bannerSubTitle" placeholder="Sub-Title" aria-label="Sub-Title"required>
        @if($errors->has('bannerSubTitle'))
            <span style="color:red;">{{ $errors->first('bannerSubTitle') }}</span>
        @endif
      </div>
      <div class="col-lg-6 mt-3">
        <input type="text" class="form-control" name="foodbeeLink" placeholder="Foodbee Link" aria-label="foodbee-Link" required>
        @if($errors->has('foodbeeLink'))
            <span style="color:red;">{{ $errors->first('foodbeeLink') }}</span>
        @endif
      </div>
      <div class="col-lg-6 mt-3">
        <input type="text" class="form-control" name="districtCourt" placeholder="District Court" aria-label="foodbee-court" required>
        @if($errors->has('districtCourt'))
            <span style="color:red;">{{ $errors->first('districtCourt') }}</span>
        @endif
      </div>
      <div class="col-lg-12 mt-3">
         <textarea class="form-control" name="bannerContent" placeholder="Content" rows="5" aria-label="With textarea" required></textarea>
          @if($errors->has('bannerContent'))
            <span style="color:red;">{{ $errors->first('bannerContent') }}</span>
        @endif
      </div>
    </div>

  <div class="mb-3 mt-5">
    <label for="exampleFormControlInput1" class="form-label">About Us</label>
    </div>
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" name="videolink" placeholder="Video links" aria-label="Title" >
        @if($errors->has('videolink'))
            <span style="color:red;">{{ $errors->first('videolink') }}</span>
        @endif
        </div>
        <div class="col-lg-12 mt-3">
           <textarea class="form-control" name="aboutUsContent" placeholder="Content" rows="5" aria-label="With textarea"required></textarea>
            @if($errors->has('aboutUsContent'))
            <span style="color:red;">{{ $errors->first('aboutUsContent') }}</span>
            @endif
        </div>
      </div>

        <div class="mb-3 mt-5">
      <label for="exampleFormControlInput1" class="form-label">Why We Are The Best</label>
      </div>
        <div class="row">
          <div class="col-lg-12 mt-3">
             <textarea class="form-control" name="whyweeAreContent" placeholder="Content" rows="5" aria-label="With textarea" required></textarea>
             @if($errors->has('whyweeAreContent'))
            <span style="color:red;">{{ $errors->first('whyweeAreContent') }}</span>
            @endif
          </div>
        </div>

         <div class="mb-3 mt-5">
      <label for="exampleFormControlInput1" class="form-label">Customer Review </label>
      </div>
        <div class="row field_wrap">
          <div class="col-lg-6">
            <textarea class="form-control" name="name[]" placeholder="name" rows="1" aria-label="With textarea" required></textarea>
            @if($errors->has('name'))
            <span style="color:red;">{{ $errors->first('name') }}</span>
            @endif
          </div>
          <div class="col-lg-4">
           <textarea class="form-control" name="Review[]" placeholder="Content" rows="1" aria-label="With textarea" required></textarea>
           @if($errors->has('Review'))
            <span style="color:red;">{{ $errors->first('Review') }}</span>
            @endif
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
                <input type="text" name="facebook" class="form-control" placeholder="facebook" aria-label="facebook" required>
                @if($errors->has('facebook'))
                <span style="color:red;">{{ $errors->first('facebook') }}</span>
                @endif
              </div>
              <div class="col">
                <input type="text" name="instagram" class="form-control" placeholder="instagram" aria-label="instagram" required>
                @if($errors->has('instagram'))
                <span style="color:red;">{{ $errors->first('instagram') }}</span>
                @endif
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="twitter" class="form-control" placeholder="Twitter" aria-label="Twitter" >
                @if($errors->has('twitter'))
                <span style="color:red;">{{ $errors->first('twitter') }}</span>
                @endif
              </div>
              <div class="col">
                <input type="text" name="youtube" class="form-control" placeholder="youtube" aria-label="youtube" >
                @if($errors->has('youtube'))
                <span style="color:red;">{{ $errors->first('youtube') }}</span>
                @endif
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="indeed" class="form-control" placeholder="indeed" aria-label="indeed" >
                 @if($errors->has('indeed'))
                <span style="color:red;">{{ $errors->first('indeed') }}</span>
                @endif
              </div>
              <div class="col">
                <input type="text" name="linkdin" class="form-control" placeholder="linkdin" aria-label="linkdin" >
                 @if($errors->has('linkdin'))
                <span style="color:red;">{{ $errors->first('linkdin') }}</span>
                @endif
              </div>
            </div>
          </div>
 
          <div class="col-lg-6">
          <div class="mb-3 mt-5">
          <label for="exampleFormControlInput1" class="form-label">Service's</label>
          </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="service1" class="form-control" placeholder="Title" aria-label="" required>
                 @if($errors->has('service1'))
                <span style="color:red;">{{ $errors->first('service1') }}</span>
                @endif
              </div>
              <div class="col-lg-2">
               <img style="height: 38px;"  src="public/img/icons/247.png">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="service2" class="form-control" placeholder="Title" aria-label="Twitter" required>
                 @if($errors->has('service2'))
                <span style="color:red;">{{ $errors->first('service2') }}</span>
                @endif
              </div>
              <div class="col-lg-2">
                <img style="height: 38px;" src="public/img/icons/img1.png">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="text" name="service3" class="form-control" placeholder="Title" aria-label="indeed" required>
                 @if($errors->has('service3'))
                <span style="color:red;">{{ $errors->first('service3') }}</span>
                @endif
              </div>
              <div class="col-lg-2">
               <img style="height: 38px;" src="public/img/icons/qult.png">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input  type="text" name="service4" class="form-control" placeholder="Title" aria-label="indeed" required>
                 @if($errors->has('service4'))
                <span style="color:red;">{{ $errors->first('service4') }}</span>
                @endif
              </div>
              <div class="col-lg-2">
               <img style="height: 38px;" src="public/img/icons/stepn.png" required>
              </div>
            </div>
          </div>
          </div> 

      <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Contact Details </label>
      </div>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" name="email" placeholder="email" aria-label="Title" required>
            @if($errors->has('email'))
                <span style="color:red;">{{ $errors->first('email') }}</span>
                @endif
          </div>
          <div class="col">
            <input type="text" class="form-control" name="Phone_no" placeholder=" Phone no" aria-label="Sub-Title" required>
            @if($errors->has('Phone_no'))
                <span style="color:red;">{{ $errors->first('Phone_no') }}</span>
                @endif
          </div>
          <div class="col">
            <input type="text" class="form-control" name="whatsapp_no" placeholder="whatsapp no" aria-label="Sub-Title" required>
            @if($errors->has('whatsapp_no'))
                <span style="color:red;">{{ $errors->first('whatsapp_no') }}</span>
                @endif
          </div>
          
          <div class="col">
            <input type="text" class="form-control" name="opening_time" placeholder="Opening Time" aria-label="Sub-Title" required>
            @if($errors->has('opening_time'))
                <span style="color:red;">{{ $errors->first('opening_time') }}</span>
                @endif
          </div>


          <div class="col-lg-12 mt-3">
             <input type="text" class="form-control" name="address" placeholder="Address"  aria-label="With textarea" required>
             @if($errors->has('address'))
                <span style="color:red;">{{ $errors->first('address') }}</span>
                @endif
          </div>
          <div class="col-lg-4 mt-3">
             <input type="text" class="form-control" name="vatNumber" placeholder="Tax Number"  aria-label="With textarea" required>
             @if($errors->has('vatNumber'))
                <span style="color:red;">{{ $errors->first('vatNumber') }}</span>
                @endif
          </div>


           <div class="col-lg-12 mt-3">
             <textarea class="form-control" name="googlemap" placeholder="Google map link" rows="5" aria-label="With textarea" required></textarea>
             @if($errors->has('googlemap'))
                <span style="color:red;">{{ $errors->first('googlemap') }}</span>
                @endif
          </div>
        </div>

        <div class="row mt-3">
              <div class="col">
               <input type="submit" class="btn btn-success" name="submit" value="save">
              </div>
            </div>
      </form>
    </div>

    @if(Session::has('error'))
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script type="text/javascript">
      alert('jksdfsdjhfgsjd');
      $.toast({
            heading: 'Error',
            text: "{{ session('error') }}",
            icon: 'error',
            loader: true,        // Change it to false to disable loader
            loaderBg: 'red',
            backgroundcolor : 'red',  // To change the background
            position: 'top-right'
        })
    </script>
    @endif



 <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrap'); //Input field wrapper
    //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
     var fieldHTML ='<div  class="col-lg-6 mt-3" id="text-'+x+'"><textarea class="form-control mt-3" name="name[]" placeholder="name" rows="1" aria-label="With textarea"></textarea></div><div class="col-lg-4" id="files-'+x+'"> <textarea class="form-control mt-3" name="Review[]" placeholder="Content" rows="1" aria-label="With textarea"></textarea></div><div class="col-lg-2" id="btndel-'+x+'"><a href="javascript:void(0);" class="remove_button btn btn-danger mt-3" data-rel="'+x+'">Delete</a></div>'; 
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