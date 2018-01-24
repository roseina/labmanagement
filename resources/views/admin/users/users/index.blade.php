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
		<h3 class="page-header">Users/Users</h3>
	</div>

	<!-- /.col-lg-12 -->
</div>
@include('errors.errors')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading text-right">
				<a class="btn btn-primary" href="{{url('admin/addorganization')}}">Add new user</a>
			</div>


			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>S.N</th>
								<th>image</th>
								<th>Image</th>
								<th>Organization Name</th>
								<th>Details</th>
								<th>Address</th>
								<th>Contact</th>
								<th>Action</th>
							</tr>
						</thead>
						@php
						$a=1;
						@endphp
						<tbody>
							
							<tr>
								<td>1</td>
								<td></td>
								<td></td>
								<td>


								</td>
								<td>
								</td>
								<td>
								</td>
								<td><a class="btn btn-info" href="">Edit</a>

									<a class="btn btn-danger" style="margin-top:5px;" data-confirm='Are you sure you want to delete ?' href="">Delete</a></td>
								</tr>


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
	<script src="{{asset('backend/js/dataTables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('backend/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
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

