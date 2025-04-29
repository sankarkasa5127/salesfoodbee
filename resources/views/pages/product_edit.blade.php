@extends('layouts.master')
@section('content')
<div class="container-fluid">
<form id="productform" method="post" enctype="multipart/form-data">
  @csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Edit Product</label>
  </div>
  <input type="hidden" class="form-control" name="id" placeholder="Title" id="id" value="{{$products->id}}">

    <div class="row">
      <div class="col-lg-6">
        <label>Name</label>
        <input type="text" class="form-control" name="name"  id="name" placeholder="" aria-label="" value="{{$products->name}}">
      </div>
      <div class="col-lg-6 ">
        <label>Choice</label>
        <input type="text" class="form-control" name="choice" id="choice" placeholder="" aria-label="" value="{{$products->choice}}">
      </div>

      <div class="col-lg-6 my-3">
        <label>SKU</label>
        <input type="text" class="form-control" name="sku" id="sku" placeholder="" aria-label="" value="{{$products->sku}}">
      </div>
      <div class="col-lg-6 my-3">
        <label>Type</label>
        <select class="form-control" name="product_type" id="product_type" >
            <option value="">Select</option>
            <option value="Food" <?php echo $products->product_type=='Food' ? 'selected':''?>>Food</option>
            <option value="Drink" <?php echo $products->product_type=='Drink' ? 'selected':''?>>Drink</option>
        </select>
      </div>

      <div class="col-lg-12">
      <label>Category</label>
        <select  class="form-control" name="category_id" id="category_id" >
            <option value="">Select</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}"  <?php  if($category->id==$products->category_id){ echo 'selected'; }else{echo '';}?>>{{$category->category}}</option>
            @endforeach
        </select>
      </div>
    </div>


      <div class="mt-4">
      <label for="exampleFormControlInput1" class="form-label">Description</label>
      <a href="javascript:void(0);" class="add_button btn btn-success">Add</a>
      </div>

        <div class="row ">
       
                        <?php $desc1 = json_decode($products->description);
							if(is_array($desc1) && count($desc1) > 0) {
								foreach($desc1 as $k => $desc) {
						?>
									<textarea class="mt-3 form-control descriptionlabel" id="description" name="description[]" value="<?php echo $desc; ?>" placeholder="Description"><?php echo $desc; ?></textarea><br>
								<?php }} else { ?>
								<textarea class="form-control" id="description" name="description[]" value="<?php echo $products->description; ?>" placeholder=""><?php echo $products->description; ?></textarea>
								
							<?php } ?>

        </div>
        <div class="field_wrap"></div>

     <div class="mt-4">
      <label for="exampleFormControlInput1" class="form-label">More Information</label>
      <a href="javascript:void(0);" class="add_button1 btn btn-success mx-3">Add</a>
      </div>

        <div class="row mt-3">
       
       <?php $more_info = json_decode($products->more_info);
           if(is_array($more_info) && count($more_info) > 0) {
               foreach($more_info as $k => $more_info1) {
       ?>
                   <textarea class="mt-3 form-control" id="more_info" name="more_info[]" value="<?php echo $more_info1; ?>" placeholder="Description"><?php echo $more_info1; ?></textarea><br>
               <?php }} else { ?>
               <textarea class="form-control" id="more_info" name="more_info[]" value="<?php echo $products->more_info; ?>" placeholder=""><?php echo $products->more_info; ?></textarea>
           <?php } ?>
</div>
<div class="field_wrap1"></div>


<div class="form-group mt-3">
<input type="checkbox" name="delivery_amount" id="delivery_amount" value="2" <?php echo $products->delivery_amount==2 ? 'checked':'' ?> >
<label for="">For delivery, Exclude from `` minimum amount `` condition</label>
</div>
         

        
        <div class="row mt-3">
              <div class="col">
               <input type="button" class="btn btn-success mb-5 saveFormtrigger" name="submit" value="Save"><br>
              </div>
            </div>
         
  </form>
</div>
 <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrap'); //Input field wrapper
    var x = 1; 
    
    $(addButton).click(function(){
        
      var fieldHTML ='<div class="row" id="text-'+x+'"><div class="col-lg-11"><textarea  class="form-control mt-3" name="description[]" placeholder="description" aria-label=""></textarea></div><div class="col-lg-1"><a href="javascript:void(0);" class="remove_button btn btn-danger mt-3" data-rel="'+x+'">Delete</a></div></div>'; 
        if(x < maxField){ 
            x++; 
            $(wrapper).append(fieldHTML); 
        }
    });
    
    $('body').on('click', '.remove_button', function(e){
        e.preventDefault();
        var thisvalue= $(this).attr('data-rel');
        $('#text-'+thisvalue).remove(); 
        x--; 
    });


    var maxField = 10; //Input fields increment limitation
    var addButton1 = $('.add_button1'); //Add button selector
    var x = 1; 
    var wrapper1 = $('.field_wrap1'); //Input field wrapper

    $(addButton1).click(function(){
      var fieldHTML ='<div class="row" id="text1-'+x+'"><div class="col-lg-11"><textarea  class="form-control mt-3" name="more_info[]" placeholder="more info" aria-label=""></textarea></div><div class="col-lg-1"><a href="javascript:void(0);" class="remove_button1 btn btn-danger mt-3" data-rel="'+x+'">Delete</a></div></div>'; 
        if(x < maxField){ 
            x++; 
            $(wrapper1).append(fieldHTML); 
        }
    });
    
    $('body').on('click', '.remove_button1', function(e){
        e.preventDefault();
        var thisvalue= $(this).attr('data-rel');
        $('#text1-'+thisvalue).remove(); 
        x--; 
    });

    $('body').on('click', '.saveFormtrigger', function(e) {
			e.preventDefault();
			$('.errormsg').remove();
			var current = $('#productform');
			var data=new FormData($('#productform')[0]);
				
				$.ajax({
					url: "{{ url('items/product_update') }}",
					type: "post",
					contentType:false,
					processData:false,
					data : data,
					success : function(response) {
						if(response.status == 'success') {
                            toastr.success('Updated Successfully');
							window.location.href = "{{ url('/items') }}";
						}else if(response.status == 'errors') {
								$('.error_msg').remove();
							$.each(response.message, function(i, message) {
								$('#'+i).after('<span class="error_msg" style="color:red">'+message+'</span>');
							});
						}
					},
				});
			return false;
		});

});
</script>
@endsection