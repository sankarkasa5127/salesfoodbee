@extends('layouts.master')
@section('content')

<style type="text/css">
	body
{
  background-color:#f5f5f5;
}
.imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
/*.imagePreview-banner{
	width: 300%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}*/
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}

.imgAdd1
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
.imgAdd2
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
.imgAdd3
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
.imgAdd4
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
.imgAdd5
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style>

<div class="container-fluid">
<?php $user = Session::get('user'); ?>
	<form action="{{route('web_img_update')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
            <input type="hidden" name="id" value="{{$data->id}}">
		  <label for="exampleFormControlInput1" class="form-label">Image title</label>
		  </div>
		    <div class="col">
        <input type="text" class="form-control" name="imageTitle" placeholder="Title" aria-label="Title" required value="{{$data->img_title}}">
      
      </div>

		<div class="mb-3 mt-5">
		  <label for="exampleFormControlInput1" class="form-label">logo Image</label>
		  </div>
		  <span>[100 x 41.52]</span>
		    <div class="row">
		      <div class="col">
				  <div class="row">
				  <div class="col-sm-2 imgUp">
				    <div class="imagePreview" style="background-image:url('{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $data->logoimg) }}')">
                    </div>
				<label class="btn btn-primary">
	    			Upload<input type="file" class="uploadFile img" name="logoimg" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
				  </div><!-- col-2 -->
				  <!-- <i class="fa fa-plus imgAdd"></i> -->
				 </div><!-- row -->
		      </div><!-- container -->
		    </div>


		    <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Banner Image</label>
		  </div>
		  <span>[1920 x 822]</span>
		
		    <div class="row">
		      <div class="col">
				  <div class="row">
				  <div class="col-sm-2 imgUp">
				    <div class="imagePreview"  style="background-image:url('{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $data->bannerimg) }}')"></div>
				<label class="btn btn-primary">
	    			Upload<input type="file" class="uploadFile img" name="bannerimg" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
				  </div><!-- col-2 -->
				  <!-- <i class="fa fa-plus imgAdd"></i> -->
				 </div><!-- row -->
		      </div><!-- container -->
		    </div>


		    <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">About-Us Image</label>
		  </div>
		  <span>[636 x 473.84]</span>
		
		    <div class="row">
		      <div class="col">
				  <div class="row">
                  <?php $aboutus = explode("|",$data->aboutusimage);?>
      @foreach($aboutus as $about)
      <div class="col-sm-2 imgUp">
				    <div class="imagePreview" style="background-image:url('{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $about) }}')"></div>
				<!-- <label class="btn btn-primary">
	    			Upload<input type="file" class="uploadFile img"  name="aboutusimage[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label> -->
                <input type="hidden" name="aboutus_hidden[]" value="{{$about}}"> 

                <i class="fa fa-times del"></i>
				  </div>
      @endforeach
	  <i class="fa fa-plus imgAdd1"></i>
				 </div>
		      </div>
		    </div>



		    <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Why we Are Best Image</label>
		  </div>
		  <span>[636 x 520.02]</span>
		
		    <div class="row">
		      <div class="col">
				  <div class="row">
                <?php $whyweare = explode("|",$data->whyweareimage);?>
                @foreach($whyweare as $whywe)
				  <div class="col-sm-2 imgUp">
				    <div class="imagePreview" style="background-image:url('{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $whywe) }}')"></div>
				<!-- <label class="btn btn-primary">
	    			Upload<input type="file" class="uploadFile img" name="whyweareimage[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label> -->
                <input type="hidden" name="whyweareimage_hidden[]" value="{{$whywe}}"> 

                <i class="fa fa-times del"></i>
				  </div>
                @endforeach
				  <i class="fa fa-plus imgAdd2"></i>
				 </div><!-- row -->
		      </div><!-- container -->
		    </div>


		    <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Book-table Image</label>
		  </div>
		  <span>[648 x 690.11]</span>
		    <div class="row">
		      <div class="col">
				  <div class="row">
                  <?php $BookTable = explode("|",$data->BookTableimage);?>
                     @foreach($BookTable as $Book)
				  <div class="col-sm-2 imgUp">
				    <div class="imagePreview" style="background-image:url('{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $Book) }}')">
                    </div>
				<!-- <label class="btn btn-primary">
	    			Upload<input type="file" class="uploadFile img" name="BookTableimage[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label> -->
                <input type="hidden" name="BookTableimage_hidden[]" value="{{$Book}}"> 

                <i class="fa fa-times del"></i>
				  </div>
                @endforeach
				  <i class="fa fa-plus imgAdd3"></i>
				 </div>
		      </div>
		    </div>



		    <div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Testimonials Image</label>
		  </div>
		  <span>[636 x 563.13]</span>
		 
		    <div class="row">
		      <div class="col">
				  <div class="row">
                  <?php $Testimonials = explode("|",$data->Testimonialsimage);?>
                @foreach($Testimonials as $Test)
				  <div class="col-sm-2 imgUp">
				    <div class="imagePreview" style="background-image:url('{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $Test) }}')"></div>
				<!-- <label class="btn btn-primary">
	    			Upload<input type="file" class="uploadFile img" name="Testimonialsimage[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label> -->
                <input type="hidden" name="Testimonialsimage_hidden[]" value="{{$Test}}"> 
                <i class="fa fa-times del"></i>
				  </div>
                @endforeach

				  <i class="fa fa-plus imgAdd4"></i>
				 </div>
		      </div>
		    </div>

		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Gallery Image</label>
		  </div>
		  <span>[416 x 349.56]</span>
		
		    <div class="row">
		      <div class="col">
				  <div class="row">
                  <?php $gallery = explode("|",$data->galleryimage);?>
                @foreach($gallery as $gall)
				  <div class="col-sm-2 imgUp">
				    <div class="imagePreview" style="background-image:url('{{ asset('/public/uploads/website/themes'.$user->userId.'/' . $gall) }}')"></div>
				<!-- <label class="btn btn-primary">
	    			Upload<input type="file" class="uploadFile img" name="galleryimage[]" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label> -->
                <input type="hidden" name="galleryimage_hidden[]" value="{{$gall}}"> 
                <i class="fa fa-times del"></i>
				  </div>
                @endforeach
				  <i class="fa fa-plus imgAdd5"></i>
				 </div>
		      </div>
		    </div>

		    <div class="row mt-3">
              <div class="col">
               <input type="submit" class="btn btn-success mb-5" name="submit" value="save">
              </div>
            </div>
		
	</form>
</div>


<script type="text/javascript">
	$(".imgAdd1").click(function(){
	  $(this).closest(".row").find('.imgAdd1').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="aboutusimage[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
	});
	$(".imgAdd2").click(function(){
	  $(this).closest(".row").find('.imgAdd2').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="whyweareimage[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
	});
	$(".imgAdd3").click(function(){
	  $(this).closest(".row").find('.imgAdd3').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="BookTableimage[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
	});
	$(".imgAdd4").click(function(){
	  $(this).closest(".row").find('.imgAdd4').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="Testimonialsimage[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
	});
	$(".imgAdd5").click(function(){
	  $(this).closest(".row").find('.imgAdd5').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="galleryimage[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
	});
$(document).on("click", "i.del" , function() {
// 	to remove card
  $(this).parent().remove();
// to clear image
  // $(this).parent().find('.imagePreview').css("background-image","url('')");
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});
</script>


@endsection