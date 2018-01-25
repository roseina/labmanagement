@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Users-Admin</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit profile-Admin
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
						<form role="form" method="post" action="{{url('admin/updateprofile')}}">
							{{csrf_field()}}
							<div class="form-group">
								<label>Name</label>

								<input class="form-control" type="text" name="name" value="{{$admin->name}}" >
								
							</div>
							<div class="form-group">
								<label>username</label>
								<input class="form-control" type="text" name="username" value="{{$admin->username}}" placeholder="Enter username">
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input class="form-control"  name="email" type="email" value="{{$admin->email}}" placeholder="Enter email">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-success btn-lg">Save</button>
								<a type="button" class="btn btn-warning btn-lg"  href="{{url('admin/admin')}}">Cancel</a>
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
