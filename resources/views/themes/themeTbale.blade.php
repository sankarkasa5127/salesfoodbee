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
	<a class="btn btn-info" href="{{route('theme')}}">ADD Content</a>
</div>
<div class="container-fluid">
    <div class="row mt-4">

	    <!--Box Start---->
		<!-- <div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 bg-white">
				<div class="card-body p-2">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Restaurant Name: </span>
							<span class="font-weight-sbold text-black fb-5 mb-0 fx-1">Name</span>
						</div>
						<div class="w-100 bdr my-2"></div>
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Banner Title: </span>
							<span class="font-weight-sbold text-black fb-5 mb-0 fx-1">Test Title</span>
						</div>
						<div class="w-100 bdr my-2"></div>
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Status: </span>
							<span class="font-weight-sbold text-black fb-5 fx-1 mb-0">0</span>
						</div>
					</div>
				</div>
				<div class="card-footer bg-light">
					<div class="col-lg-12 col-md-12 col-12 text-center">
						<a href="#" class="text-muted small text-decoration-none">Email <i class="fa fa-edit"></i></a>
						<span class="px-3">|</span>
						<a href="#" class="text-muted small text-decoration-none">Edit <i class="fa fa-trash"></i></a>
						<span class="px-3">|</span>
						<a href="#" class="text-muted small text-decoration-none">Export <i class="fas fa-file-export"></i></a>
					</div>
				</div>
			</div>
		</div> -->
		<!--Box End---->
	    
		<!--Box Start---->
		<!-- <div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 bg-white">
				<div class="card-body p-2">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Restaurant Name: </span>
							<span class="font-weight-sbold text-black fb-5 mb-0 fx-1">Name</span>
						</div>
						<div class="w-100 bdr my-2"></div>
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Banner Title: </span>
							<span class="font-weight-sbold text-black fb-5 mb-0 fx-1">Test Title</span>
						</div>
						<div class="w-100 bdr my-2"></div>
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Status: </span>
							<span class="font-weight-sbold text-black fb-5 fx-1 mb-0">0</span>
						</div>
					</div>
				</div>
				<div class="card-footer bg-light">
					<div class="col-lg-12 col-md-12 col-12 text-center">
						<a href="#" class="text-muted small text-decoration-none">Email <i class="fa fa-edit"></i></a>
						<span class="px-3">|</span>
						<a href="#" class="text-muted small text-decoration-none">Edit <i class="fa fa-trash"></i></a>
						<span class="px-3">|</span>
						<a href="#" class="text-muted small text-decoration-none">Export <i class="fas fa-file-export"></i></a>
					</div>
				</div>
			</div>
		</div> -->
		<!--Box End---->

		<!--Box Start---->
		<?php $modalCount=1; ?>
		@foreach($theme as $thm)
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 bg-white">
				<div class="card-body p-2">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">#: </span>
							<span class="font-weight-sbold text-black fb-5 mb-0 fx-1">{{$loop->iteration}}</span>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Restaurant Name: </span>
							<span class="font-weight-sbold text-black fb-5 mb-0 fx-1">{{$thm->restaurant_name}}</span>
						</div>
						<div class="w-100 bdr my-2"></div>
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Title: </span>
							<span class="font-weight-sbold text-black fb-5 mb-0 fx-1">{{$thm->bannerTitle}}</span>
						</div>
						<div class="w-100 bdr my-2"></div>
						<div class="col-lg-12 col-md-12 col-12">
							<span class="text-muted mb-1 small">Status: </span>
							<span class="font-weight-sbold text-black fb-5 fx-1 mb-0"><?php if($thm->status == 0){echo'Inactive';}else{echo'Active';} ?></span>
						</div>
					</div>
				</div>
				<div class="card-footer bg-light">
					<div class="col-lg-12 col-md-12 col-12 text-center">
						<a href="{{route('theme_edit',$thm->id)}}" class="text-muted small text-decoration-none"> Edit<i class="fa fa-edit"></i></a>
						<span class="px-3">|</span>
						<a href="{{route('theme_delete',$thm->id)}}" class="text-muted small text-decoration-none">Delete <i class="fa fa-trash"></i></a>
						<span class="px-3">|</span>
						<a href="#"  data-toggle="modal" data-target="#exportModalCenter{{$modalCount}}" class="text-muted small text-decoration-none">Export <i class="fas fa-file-export"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!--Box End---->


		<div class="modal fade" id="exportModalCenter{{$modalCount}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       <div class="container">
		         <form action="{{route('export_theme')}}" method="post">
		          @csrf
		          <div class="form-check">
		            <input class="form-check-input" name="Theme" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="StandardTheme">
		            <label class="form-check-label" for="flexRadioDefault1">
		              Standard Theme
		            </label>
		          </div>

		          <div class="form-check">
		            <input class="form-check-input" name="Theme" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="OmegaTheme">
		            <label class="form-check-label" for="flexRadioDefault1">
		              Omega Theme
		            </label>
		          </div>

		           <div class="form-check">
		            <input class="form-check-input" name="Theme" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="UltraTheme">
		            <label class="form-check-label" for="flexRadioDefault1">
		              Ultra Theme
		            </label>
		          </div>

		          <div class="form-check">
		            <input class="form-check-input" name="Theme" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="DiamandTheme">
		            <label class="form-check-label" for="flexRadioDefault1">
		              Diamand Theme
		            </label>
		          </div>

		           <div class="form-check">
		            <input class="form-check-input" name="Theme" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="SilverTheme">
		            <label class="form-check-label" for="flexRadioDefault1">
		              Silver Theme
		            </label>
		          </div>
		         
		          <input type="hidden" name="restaurant_id" value="{{$thm->restaurant_id}}">
		          <input type="hidden" name="export_id" value="{{$thm->id}}">
		        
		          <div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Options</label>
				  </div>
				  <select class="custom-select" id="inputGroupSelect01" name="image_name" required="true">
				    <option selected>Choose...</option>
				    @foreach($Website as $web)
				    <option value="{{$web->id}}">{{$web->img_title}}</option>
				   @endforeach
				  </select>
				</div>
		         
		       </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <input type="submit" class="btn btn-primary" value="Export">
		      </div>
		       </form>
		    </div>
		  </div>
		</div>
		<?php $modalCount++;?>
		 @endforeach
	</div>
	</div>


@endsection