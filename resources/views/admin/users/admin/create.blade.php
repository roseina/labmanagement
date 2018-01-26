@extends('admin.master')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{url('backend/widgets/datepicker/datepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('backend/widgets/input-switch/inputswitch.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('backend/css/form.css')}}">

@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Admin</h1>
	</div>
	@include('errors.errors')
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Admin-add user
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form method="post" action="{{url('admin/storeuser')}}" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Name <span style="color:red;">*</span> </label>
								<div class="col-lg-12">
									<div class="col-md-4">
										<input class="form-control" value="{{Input::old('first_name')}}" type="text" placeholder="First name" name="first_name">
									</div>
									<div class="col-md-4">
										<input class="form-control" value="{{Input::old('middle_name')}}" type="text" placeholder="Middle name" name="middle_name">
									</div>
									<div class="col-md-4">
										<input class="form-control" value="{{Input::old('last_name')}}" type="text" placeholder="Last name" name="last_name">
									</div>
								</div>

							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Date Of Birth</label>
								<div class="col-sm-8">
									<div class="input-prepend input-group">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
										<input class="bootstrap-datepicker form-control" value="1990-01-01" data-date-format="mm/dd/yy" type="text" name="dob">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Gender</label>
								<div class="col-sm-8">
									<label class="radio-inline">
										<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="male" checked="checked">Male
									</label>
									<label class="radio-inline">
										<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="female">Female
									</label>
									<label class="radio-inline">
										<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="other">other
									</label>
								</div>
							</div>
							@if($profile=="false")
							<div class="form-group row">
								
								<label class="col-sm-6 col-sm-6 control-label">Add a new profile <span style="color:red;">*</span></label>
								<div class="col-sm-8">
									<input class="form-control" value="{{Input::old('profile')}}" type="text" placeholder="profile name" name="profile_name" required>

									
								</div>
							</div>
							@else
							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Profile</label>
								<div class="col-sm-8">
									<select class="form-control" type="text" name="profile" id="profile">
										<option value="">
											Select Profile
										</option>
										@foreach($profile as $p)
										<option value="{{ $p->title }}" @if(old('profile')==$p->title) selected="selected" @endif>{{$p->title}} </option>
										@endforeach
										<option value="Others" @if(old('profile')=='Others') selected="selected" @endif>Others</option>
										
									</select>
								</div>
							</div>
							@endif

							<div class="form-group row" id="addProfile">
								
								<label class="col-sm-6 col-sm-6 control-label">Add a new profile <span style="color:red;">*</span></label>
								<div class="col-sm-8">
									<input class="form-control" value="{{Input::old('profile')}}" type="text" placeholder="profile name" name="profile_name" required>

									
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Designation</label>
								<div class="col-sm-8">
									<select class="form-control" type="text" name="designation">
										<option>Doctor</option>
										<option>Lab technician</option>
										<option>Nurse</option>
										<option>Pathologist</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								
								<label class="col-sm-6 col-sm-6 control-label">Address</label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="Address" value="{{Input::old('address')}}" type="text" name="address">

									
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-6 col-sm-6 control-label">District</label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="District" value="{{Input::old('district')}}" type="text" name="district">

								</div>

							</div>

							<div class="form-group row">
								<label class="col-sm-6 col-sm-6 control-label">Country</label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="Country" value="{{Input::old('country')}}" type="text" name="country">

								</div>

							</div>
							<div class="form-group row">

								<label class="col-sm-6 col-sm-6 control-label">Mobile Number</label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="Mobile number" value="{{Input::old('mobile_number')}}" type="text" name="mobile_number">

								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">E-mail</label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="Email" value="{{Input::old('email')}}" name="email" type="email">

								</div>
							</div>


							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Username</label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="" value="{{Input::old('username')}}" type="text" name="username">

								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Password</label>
								<div class="col-sm-8">
									<input class="form-control"  placeholder="Password" type="password" name="password">

								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-12 col-sm-12 control-label">Choose file for signature</label>
								<div class="col-sm-8">
									<input class="form-control" type="file" name="signature">
								</div>
							</div>
							
							<div class="text-center">

								<button type="submit" class="btn btn-success">Add</button>
								<a class="btn btn-warning" href="{{'admin/admin'}}">Cancel</a>
							</div>
						</form>
					</div>

				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@endsection
@section('scripts')
<script type="text/javascript" src="{{url('backend/widgets/input-switch/inputswitch.js')}}"></script>
<script type="text/javascript">
	/* Input switch */
	$(function() { "use strict";
		$('.input-switch').bootstrapSwitch();
	});
</script>
<script type="text/javascript" src="{{url('backend/widgets/datepicker/datepicker.js')}}"></script>
<script type="text/javascript">
	/* Datepicker bootstrap */
	$(function() { "use strict";
		$('.bootstrap-datepicker').bsdatepicker({
			format: 'yyyy-mm-dd',
		});
	});
	$('.bootstrap-datepicker').on('changeDate', function(ev){
		$(this).bsdatepicker('hide');
	});
</script>
<script>
	$("#profile").change(function()
	{
		profileOpen();
	});
	window.onload = function() {
		profileOpen();
	};
	function profileOpen(){
		if($("#profile").val() =="Others")
		{
			$('#addProfile').show();
		}
		else
		{
			$('#addProfile').hide();
		}
	}
</script>
@endsection

