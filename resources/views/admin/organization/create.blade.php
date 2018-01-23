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
				Add new Organization
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
						<form method="POST" action="{{url('storeorganization')}}"  class="form-horizontal bordered-row" enctype="multipart/form-data">
							{{csrf_field()}}

							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Organization Name</label>
								<div class="col-sm-6">
									<input class="form-control" name="organization_name" placeholder="Organization name">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Country</label>
								<div class="col-sm-6">
									<input class="form-control" name="country" placeholder="Country">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">District</label>
								<div class="col-sm-6">
									<input class="form-control" name="district" placeholder="district">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Zone</label>
								<div class="col-sm-6">
									<input class="form-control" name="zone" placeholder="zone">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Address1</label>
								<div class="col-sm-6">
									<input class="form-control" name="address1" placeholder="address1">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Address2</label>
								<div class="col-sm-6">
									<input class="form-control" name="address2" placeholder="address2">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Phone 1</label>
								<div class="col-sm-6">
									<input class="form-control" name="phone1" placeholder="phone1">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Phone 2</label>
								<div class="col-sm-6">
									<input class="form-control" name="phone2" placeholder="phone2">
								</div>
							</div>
							
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">fax</label>
								<div class="col-sm-6">
									<input class="form-control" name="fax" placeholder="fax">
								</div>
							</div>


							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Choose a logo</label>
								<div class="col-sm-6">
									<input type="file" name="logo">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Choose an image </label>
								<div class="col-sm-6">
									<input type="file" name="image">
								</div>
							</div>
							<div class="text-center">
							<button type="submit" class="btn btn-success btn-lg">Add</button>
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