@extends('admin.master')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Organization</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Organization => {{$editData->organization_name}}
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
						<form method="POST" action="{{url('updateorganization')}}"  class="form-horizontal bordered-row" enctype="multipart/form-data">
							{{csrf_field()}}

							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Organization Name</label>
								<div class="col-sm-6">
									<input class="form-control" name="organization_name" value="{{$editData->organization_name}}"placeholder="Organization name">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Country</label>
								<div class="col-sm-6">
									<input class="form-control" name="country" value="{{$editData->country}}"placeholder="Country">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">District</label>
								<div class="col-sm-6">
									<input class="form-control" name="district" value="{{$editData->district}}"placeholder="district">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Zone</label>
								<div class="col-sm-6">
									<input class="form-control" name="zone" value="{{$editData->zone}}"placeholder="zone">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Address1</label>
								<div class="col-sm-6">
									<input class="form-control" name="address1" value="{{$editData->address1}}"placeholder="address1">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Address2</label>
								<div class="col-sm-6">
									<input class="form-control" name="address2" value="{{$editData->address2}}"placeholder="address2">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Phone 1</label>
								<div class="col-sm-6">
									<input class="form-control" name="phone1" value="{{$editData->phone1}}"placeholder="phone1">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Phone 2</label>
								<div class="col-sm-6">
									<input class="form-control" name="phone2" value="{{$editData->phone2}}"placeholder="phone2">
								</div>
							</div>
							
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">fax</label>
								<div class="col-sm-6">
									<input class="form-control" name="fax" value="{{$editData->fax}}"placeholder="fax">
								</div>
							</div>


	<div class="form-group">
<label for="name" class="col-sm-2 col-sm-2 control-label">Choose a logo</label>
						
					<div class="col-sm-6">
<input class="form-control" id="" type="file"  accept="image/*" name="logo">
		@if($editData->logo!="" && file_exists(public_path('uploads/organizations/logos'.$editData->logo)))
<img src="{{ asset('uploads/organizations/logos'.$editData->logo) }}" style="max-width:100px;height:auto;margin-top:10px;	">
<a href="{{ URL::to(PREFIX.'/oa_users/delPhoto?id='.$editData->id .'&& image='.$editData->logo)}}" data-confirm='Are you sure you want to remove this image?' style="margin-top: 20px;" class="btn btn-danger"><i class="fa fa-trash">Remove image</i> </a>
			@else
													<p>No Image.</p>
													@endif
												</div>
							
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Choose an image </label>
								<div class="col-sm-6">
									{{-- <div class="col-sm-6">
													<input class="form-control" id="" type="file"  accept="image/*" name="logo">
													@if($singleData->profile_image!="" && file_exists(public_path('uploads/Oa_users/'.$singleData->profile_image)))
													<img src="{{ asset('uploads/Oa_users/'.$singleData->profile_image) }}" style="max-width:100px;height:auto;margin-top:10px;	">
													<a href="{{ URL::to(PREFIX.'/oa_users/delPhoto?id='.$singleData->id .'&& image='.$singleData->profile_image)}}" data-confirm='Are you sure you want to remove this image?' style="margin-top: 20px;" class="btn btn-danger"><i class="fa fa-trash">Remove image</i> </a>
													@else
													<p>No Image.</p>
													@endif
												</div> --}}
								</div>
							</div>
							<div class="text-center">
							<button type="submit" class="btn btn-success btn-lg">Save</button>
							<a type="button" class="btn btn-warning btn-lg"  href="{{url('admin/organizations')}}">Cancel</a>
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