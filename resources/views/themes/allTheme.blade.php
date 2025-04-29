@extends('layouts.master')
@section('content')
<div class="container-fluid themes-frame">
	<div class="row mt-4">
		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card active">
			  <div class="card-body p-1">
				<img src="public/img/themes/html1.png" class="img-fluid">
				<a href="{{route('theme_1_demo')}}" target="_blank" class="btn preview-details">Preview</a>
			  </div>
			  <div class="card-footer">
				<!--<a href="#" class="">Activate: Theme Name</a>-->
				<h6 class="text-white mb-0">Active: <small>Standard Theme</small></h6>
				<form action="{{route('asset_download')}}" method="post">
					@csrf
					<input type="hidden" name="Theme_name" value="StandardTheme">
					<button type="submit" class="btn btn-sm btn-outline-danger text-black mgl">Assets</button>
				</form>
				<a href="{{route('web_img_form')}}" class="btn btn-sm btn-warning text-black">Customize</a>
			  </div>
			</div>
		</div>


		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
			  <div class="card-body p-1">
				<img src="public/img/themes/html2.png" class="img-fluid">
				 <a href="{{route('theme_2_demo')}}" target="_blank" class="btn preview-details">Preview</a>
			  </div>
			  <div class="card-footer">
				<h6 class="text-black mb-0">Omega Theme</h6>
				<form action="{{route('asset_download')}}" method="post">
					@csrf
					<input type="hidden" name="Theme_name" value="omega_theme">
					<button type="submit" class="btn btn-sm btn-outline-danger text-black mgl">Assets</button>
				</form>
				<a href="{{route('web_img_form')}}" class="btn btn-sm btn-warning text-black">Customize</a>
			  </div>
			</div>
		</div>


		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
			  <div class="card-body p-1">
				<img src="public/img/themes/html3.png" class="img-fluid">
				<a href="{{route('theme_3_demo')}}" target="_blank" class="btn preview-details">Preview</a> 
			  </div>
			  <div class="card-footer">
				<h6 class="text-black mb-0">Ultra Theme</h6>
				<form action="{{route('asset_download')}}" method="post">
					@csrf
					<input type="hidden" name="Theme_name" value="UltraTheme">
					<button type="submit" class="btn btn-sm btn-outline-danger text-black mgl">Assets</button>
				</form>
				<a href="{{route('web_img_form')}}" class="btn btn-sm btn-warning text-black">Customize</a>
			  </div>
			</div>
		</div>


		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
			  <div class="card-body p-1">
				<img src="public/img/themes/html4.png" class="img-fluid">
				 <a href="{{route('theme_4_demo')}}" target="_blank" class="btn preview-details">Preview</a>
			  </div>
			  <div class="card-footer">
				<h6 class="text-black mb-0">Diamand Theme</h6>
				<form action="{{route('asset_download')}}" method="post">
					@csrf
					<input type="hidden" name="Theme_name" value="DiamandTheme">
					<button type="submit" class="btn btn-sm btn-outline-danger text-black mgl">Assets</button>
				</form>
				<a href="{{route('web_img_form')}}" class="btn btn-sm btn-warning text-black">Customize</a>
			  </div>
			</div>
		</div>


		<div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
			  <div class="card-body p-1">
				<img src="public/img/themes/html5.png" class="img-fluid">
				 <a href="{{route('theme_5_demo')}}" target="_blank" class="btn preview-details">Preview</a>
			  </div>
			  <div class="card-footer">
				<h6 class="text-black mb-0">Silver Theme</h6>
				<form action="{{route('asset_download')}}" method="post">
					@csrf
					<input type="hidden" name="Theme_name" value="SilverTheme">
					<button type="submit" class="btn btn-sm btn-outline-danger text-black mgl">Assets</button>
				</form>
				<a href="{{route('web_img_form')}}" class="btn btn-sm btn-warning text-black">Customize</a>
			  </div>
			</div>
		</div>

	</div>
</div>
@endsection