@extends('admin.master')
@section('stylesheets')
<!-- DataTables CSS -->

<link href="{{asset('backend/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{asset('backend/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">


@endsection

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Users/Admin</h3>
	</div>

	<!-- /.col-lg-12 -->
</div>
@include('errors.errors')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading text-right">
				<a class="btn btn-primary" href="{{url('admin/adduser')}}">Add new user</a>
			</div>


			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Full Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>1.</td>
								<td>{{$admin->name}}</td>
								<td>{{$admin->username}}</td>
								<td>{{$admin->email}}</td>
								<td><a class="btn btn-info" href="{{url('admin/editprofile')}}">Edit</a>

									<a class="btn btn-danger" style="margin-top:5px;" data-toggle="modal" data-target="#updatePassword">Reset Password</a></td>
								</tr>
								<div class="modal fade in" id="updatePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"><div class="modal-backdrop fade in" style="height: 333px;"></div>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title" id="myModalLabel">Update password</h4>
										</div>
										<form class="form-horizontal bordered-row" method="post" action="{{url('admin/updatepassword')}}">
											{{csrf_field()}}
											<div class="modal-body">

												<div class="form-group row ">
													<label class="col-sm-2 col-sm-2 control-label">New password</label>
													<div class="col-sm-6">
														<input class="form-control" type="password" name="password" placeholder="Type Password">
													</div>

												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-sm-2 control-label" >Re-type password</label>
													<div class="col-sm-6">
														<input class="form-control" type="password" name="confirmPassword" placeholder="Re-type password">
													</div>
												</div>
											</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</div>
										</form>
										
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>


						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->

			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

@endsection

@section('scripts')

<script>



	$(document).ready(function() {
		$('a[data-confirm]').click(function(ev) {
			var href = $(this).attr('href');
			if (!$('#dataConfirmModal').length) {

				$('body').append('<div id="dataConfirmModal" aria-hidden="true" aria-labelledby="mySmallModalLabel" class="modal modal-attr fade bd-example-modal-sm" role="dialog" tabindex="-1"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="dataConfirmLabel">{{'Please Confirm'}}</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span> </button></div><div class="modal-body"> </div><div class="modal-footer"><button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true" type="button">Close</button><a class="btn btn-primary" id="dataConfirmOK">Ok</a></div></div></div></div>');

			}
			$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
			$('#dataConfirmOK').attr('href', href);
			$('#dataConfirmModal').modal({show:true});
			return false;
		});
	});
</script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>
@endsection

