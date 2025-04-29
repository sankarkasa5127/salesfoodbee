@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<style type="text/css">
.slider-outer{padding: 0px 50px;position: relative;overflow: hidden;}
.owl-item{width: auto!important;}
.owl-dots{display:none;}
#togal_rable .btn-toggle.active {background-color: #4caf50!important;}
#togal_rable .btn-toggle:before, #togal_rable .btn-toggle:after {color: #000;display: none;}
.slider-outer .owl-prev, .slider-outer .owl-next{background:#ddd!important; width:20px; height:20px; border-radius:50%!important;} 
.slider-outer .owl-prev span, .slider-outer .owl-next span{font-size: 28px;font-weight: 500;line-height: 15px;}
.owl-item a{font-size: 15px;font-weight: 600;margin: 0 10px;line-height: 2; color:#000; text-decoration:none;}
.owl-item .item{border-bottom: 2px solid transparent;}
.owl-item.active .item, .owl-item:active .item, , .owl-item:focus .item{background: #f6e300;border-bottom: 2px solid #000000;}
.owl-item .item:hover, .owl-item .item.active {background: #f6e300;border-bottom: 2px solid #000000;}
.menu-table{background:#fff; border-radius:10px; box-shadow:1px 1px 3px 2px #cccccc78; padding:30px; margin-top:20px; margin-bottom:20px;} 
.menu-table .table th{color:#000; font-size:14px; font-weight:600;} 
.menu-table .table th.t1, .menu-table .table th.t-11{width:50px; color:#e74a3b;}
.menu-table .table td{color:#000; font-size:14px; font-weight:500;vertical-align: middle;}
.menu-table .table td.w-1, .menu-table .table th.t2{width:300px;}
.menu-table .table td.w-2, .menu-table .table th.t3{width:100px;}
.menu-table .table td.w-3, .menu-table .table th.t4{width:100px;}
.menu-table .table td input{border-radius:5px; border:1px solid #ccc; padding:3px 5px; font-weight:500;background:#dfdfdf; text-align:center;}
.menu-table h5{font-size:16px; color:#000; font-weight:600;}
.menu-table .btn-toggle{margin-left:0px;}
.bx{margin:-8px 0 0 15px;}
 
@media only screen and (max-width:767px){
.slider-outer{padding: 10px 20px 0;}
.menu-table{width:95%;}	
.menu-table .table td{font-size:13px;} 
.menu-table .table td.w-1{padding: 5px 5px;}
}

.catedit:hover{
	cursor:pointer;
}

</style>
<?php $catid=1; ?>
<div class="slider-outer">
    <div class="owl-carousel owl-theme">
  	<?php $count=1; ?>  
      @foreach($categories as $cat)
    <div class="item" data-id="item-{{$count}}" id="item-{{$count}}"><a href="#cat-{{$count}}"><span>{{$cat->category}}</span></a></div>
    <?php $count++?>
     @endforeach
    </div>
</div>

<div class="container menu-table">	
	<div class="row">
		<div style="float:right"><a href="items/menubuilder" style="float:right">Menu Builder</a></div>
		<table  class="table table-hover table-bordered">
			<thead>
				    <tr>
				      <th scope="col" class="t1">#</th>
				      <th scope="col" class="t2">Name</th>
				      <th scope="col" class="t3">Price</th>
				      <th scope="col" class="t4">Status</th>
				    </tr>
			  </thead>
		</table>

@foreach($categories as $category)

<div id="cat-{{$catid}}" class="d-flex"> <h5> [{{$catid}}]&nbsp; {{$category->category}} &nbsp;&nbsp;</h5><i class="bi bi-pencil-square catedit" data-id="{{$category->id}}"></i>
 
<div class="form-check form-check-inline bx">
  <input class=" form-check-input menuList" type="checkbox" id="inlineCheckbox2" value="option2" data-id="{{$category->id}}" <?php echo  $category->status==1?"checked":"" ?>>
  <label class="form-check-label" for="inlineCheckbox2"> Website</label>
</div>

</div>

		<table  id="togal_rable" class="table table-hover table-bordered">
		  <tbody>
		  	<?php $status_count = 1;?>
		  	@foreach($itemList as $items)
		  	@if($items->category_id == $category->id )
		    <tr>
		      <th scope="row" class="t-11">{{$status_count}} </th>
		      <td class="w-1">{{$items->name}} <a href="{{url('items/product')}}/{{$items->id}}"><i class="bi bi-pencil-square " ></i></a></td>
		      <td class="w-2"><input type="text" class="priceformat" data-id='{{$items->id}}' maxlength="5" size="5"  name="Price" id="price_{{$items->id}}" value="{{ Helper::formatPrice($items->price)}}"><br>
		      <span id="price_msg_{{$items->id}}" style="color:green"></span>
		      </td>
<td class="w-3">
<button type="button" class="itemStatus btn btn-toggle <?if($items->status == '1'){echo'active';}?>"  data-id="{{$items->id}}" data-toggle="button" aria-pressed="<?if($items->status == '1'){echo'true';}else{echo'false';}?>" autocomplete="<?if($items->status == '1'){echo'on';}else{echo'off';}?>">
<div class="handle"></div>
</button>
<span id="status_msg_{{$items->id}}" style="color:green"></span>
<div class="form-check form-check-inline">
  <input class="form-check-input menuitemList" type="checkbox" id="inlineCheckbox2" value="option2" data-id="{{$items->id}}" data-value="{{$items->category_id}}" <?php echo  $items->show_status==1?"checked":"" ?>>
  <label class="form-check-label" for="inlineCheckbox2">Website</label>
</div>
		    </tr>
		    <?php $status_count++;?>
		    @endif
		    @endforeach
		  </tbody>
		</table>
		<?php $catid++;?>
		 @endforeach
	</div>
</div>

<div class="modal fade" id="cat_modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Edit Category</h5>
            <i class="bi bi-x close"></i>
          </div>
          <form role="form" id="updatecat" class="clearfix">
                @csrf
              <div class="modal-body">
                <div class="row">
                    
                    <input type="hidden" id="id" name="id">

					<div class="form-group col-md-12">
					<label for="">Category</label>
    				<input type="text" name="category"  class="form-control" id="category">
    				</div>					
					
					<div class="form-group col-md-12">
					<label for="">Note</label>
    				<textarea rows="" cols="" name="note"  class="form-control" id="note"></textarea> 
    				</div>	
					
					<div class="form-group col-md-12">
					<label for="">Description</label>
    				<textarea rows="" cols="" name="description"  class="form-control" id="description"></textarea> 
    				</div>	
					 
                </div>
              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-primary updatecategory">Update</button>
              </div>
          </form>
        </div>
      </div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
    var skutimer = '';
$('body').on('keyup', '.sku_field', function() {
  clearTimeout(skutimer);
  var id = $(this).attr('data-id');
	var value = $('#sku_'+id).val();

	$('#sku_msg_'+id).attr('style', 'color: green');
	$('#sku_msg_'+id).html('');
  skutimer = setTimeout(function() {
    
	url = "{{secure_url('priceUpdate')}}";
	$.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                   'id': id,
                   'value': value,
                   'type': 'sku'
                    
                    },
                success:function(data){  
                     $('#sku_msg_'+id).html('Successfully update');
					$('#sku_msg_'+id).fadeOut(2000);
                },
                 complete: function () {
                    $("#ajax_loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                 }
                });
	// CommonManager.ajax('https://foodbee.de/app/store/updateproductbyid', ProductManager.updateProductResponse, 'post', data, 'json', {'type': 'sku', 'target': 'sku_msg_'+id});
	
  }, 2000); //Waits for 2 seconds after last keypress to execute the above lines of code
});

var priceformattimer = '';
$('body').on('keyup', '.priceformat', function() {
	
	clearTimeout(priceformattimer);
	var id = $(this).attr('data-id');
	var value = $('#price_'+id).val();
	$('#price_msg_'+id).attr('style', 'color: green');
	$('#price_msg_'+id).html('');
	priceformattimer = setTimeout(function() {
		// CommonManager.ajax('https://foodbee.de/app/store/updateproductbyid', ProductManager.updateProductResponse, 'post', data, 'json', {'type': 'price', 'target': 'price_msg_'+id});
		url = "{{secure_url('priceUpdate')}}";
		$.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                   'id': id,
                   'value': value,
                   'type': 'price'
                    },
                success:function(data){  
                    $('#price_msg_'+id).html('Successfully update');
					$('#price_msg_'+id).fadeOut(2000);
                },
                 complete: function () {
                    $("#ajax_loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                 }
                });

	
	}, 2000); //Waits for 2 seconds after last keypress to execute the above lines of code
});
});
  // bsCustomFileInput.init();
	// ProductManager.init('https://foodbee.de/app/');

</script>

<script type="text/javascript">
	$(document).ready(function () {
		$(".itemStatus").click(function(){
			var id = $(this).attr('data-id');
			var ariapressed = $(this).attr('aria-pressed');
			$('#status_msg_'+id).attr('style', 'color: green');
			$('#status_msg_'+id).html('');
			priceformattimer = setTimeout(function() {
		
			url = "{{secure_url('priceUpdate')}}";
			$.ajax({
	            url: url,
	            type: "post",
	            async: true,
	            data: { 
	                   _token: "{{ csrf_token() }}",
	                   'id': id,
	                   'value': ariapressed,
	                   'type': 'status'
	                    },
	                success:function(data){  
	                    $('#status_msg_'+id).html('Successfully update');
						$('#status_msg_'+id).fadeOut(2000);
	                },
	                 complete: function () {
	                    $("#ajax_loader").hide(); //Request is complete so hide spinner
	                },   
	                 error: function (xhr, exception) {
	                 }
	                });

		
		}, 2000); //Waits for 2 seconds after last keypress to execute the above lines of code

		});
	});
</script>
<script type="text/javascript">
      $(document).ready(function () {

        $('body').on('click', '.item', function() {
      		$('.item').removeClass('active');
      	$(this).addClass('active');
      	});

		$('body').on('click', '.close', function() {
			                $('#cat_modal').modal('hide');	
			                $('#id').val('');
							$('#description').val('');
							$('#category').val('');
							$('#note').val('');					
      	});

	$('body').on('change', '.menuList', function() {

	toastr.options.timeOut = 3000;

	var checking= $(this).is(':checked') ?1:2;
    var id= $(this).attr('data-id');

	var el=$(this);

    $.ajax({
        type:'POST',
        url:"{{url('items/changemenu')}}",
        data:{
			_token: "{{ csrf_token() }}",
			'checked':checking,
			'id':id},
        success:function(response){
            if(response.status == 'success') {
              toastr.success(response.message);
			      }else if(response.status == 'error') {
              $(el).prop('checked',false); 
              toastr.error(response.message);
            } 
        }
    }); 

    })


	            $('body').on('click', '.catedit', function() {
				var id = $(this).attr('data-id');

				$.ajax({
					url: "{{ url('/items/getCatById') }}",
					dataType : "json",
					type: "get",
					data : {'id':id},
					success : function(response) {
						$('#cat_modal').modal('show');						

						if(response.status == 'success') {
							
							$('#id').val(response.data.id);
							$('#description').val(response.data.description);
							$('#category').val(response.data.category);
							$('#note').val(response.data.note);
                            return false;
						
						} else if(response.status == 'error') {
							
							alert(response.message);
							
						}
						
					},
				});
				
			});


			$('body').on('click', '.updatecategory', function() {
				
				var params = new FormData($('#updatecat')[0]);
				$.ajax({
					url: "{{url('items/cat_update')}}",
					dataType : "json",
					type: "post",
					data : params,
					processData: false,
					contentType: false,
					cache: false,
					success : function(response) {
						$('.err_msg').remove();
						if(response.status == 'success') {
						
						toastr.success('Updated Successfully');
						// $('#cat_modal').modal('hide');		
						location.reload();				
							
						} else if(response.status == 'errors') {
							
							$.each(response.message, function(i, message) {
								$('#'+i).after('<span class="error_msg" style="color:red">'+message+'</span>');
							});
							
						} else if(response.status == 'error') {
							
							alert(response.error);
							
						}
					},
				});
				
				return false;
            

			});
		

$('body').on('change', '.menuitemList', function() {

toastr.options.timeOut = 3000;

var checking= $(this).is(':checked') ?1:2;
var id= $(this).attr('data-id');
var cid= $(this).attr('data-value');

var el=$(this);

$.ajax({
	type:'POST',
	url:"{{url('items/changemenuitem')}}",
	data:{
		_token: "{{ csrf_token() }}",
		'checked':checking,
		'id':id,
		'cid':cid
	},
	success:function(response){
		if(response.status == 'success') {
		  toastr.success(response.message);
		}else if(response.status == 'error') {
		  $(el).prop('checked',false); 
		  toastr.error(response.message);
		} 
	}
});


})

      });
</script>
@endsection