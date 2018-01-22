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
						<form method="POST" action="{{url('admin/storeorganization')}}"  class="form-horizontal bordered-row" enctype="multipart/form-data">

							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Organization Name</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Country</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">district</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Zone</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">address1</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">address2</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Phone 1</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Phone 2</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>
							
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">fax</label>
								<div class="col-sm-6">
									<input class="form-control" placeholder="Enter text">
								</div>
							</div>


							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Choose a logo</label>
								<div class="col-sm-6">
									<input type="file">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 col-sm-2 control-label">Choose an image </label>
								<div class="col-sm-6">
									<input type="file">
								</div>
							</div>

							<button type="submit" class="btn btn-default">Submit Button</button>
							<button type="reset" class="btn btn-default">Reset Button</button>
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