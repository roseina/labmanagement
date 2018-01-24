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
		<h3 class="page-header">Organization</h3>
	</div>

	<!-- /.col-lg-12 -->
</div>
@include('errors.errors')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading text-right">
				<a class="btn btn-primary" href="{{url('admin/addorganization')}}">Add new organization</a>
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
							@foreach($allDatas as $d )
							<tr>
								<td>{{$a++}}</td>
								<td>@if($d->logo!= '' && file_exists(public_path('uploads/organizations/logos/' .$d->logo)))

            <img src= {{URL::asset('uploads/organizations/logos/'.$d->logo)}} width="100" height="100">
            @else  <img src= {{URL::asset('backend/image-resources/image_notfound.png')}} width="100" height="100">@endif</td>

								<td>@if($d->image!= '' && file_exists(public_path('uploads/organizations/images/' .$d->image)))

            <img src= {{URL::asset('uploads/organizations/images/'.$d->image)}} width="100" height="100">
            @else  <img src= {{URL::asset('backend/image-resources/image_notfound.png')}} width="100" height="100">@endif</td>
								<td>{{$d->organization_name}}</td>
								<td>
									<ul>
										<li>Country: {{$d->country}}</li>
										<li>Zone: {{$d->zone}}</li>
										<li>District: {{$d->district}} </li>

									</ul>

								</td>
								<td>
									<ul>
										<li>Address1: {{$d->address1}}</li>
										<li>Address2: {{$d->address2}}</li>
										
									</ul></td>
									<td><li>Phone1: {{$d->phone1}}</li>
										<li>Phone2: {{$d->phone2}}</li>
										<li>Fax: {{$d->fax}}</li>
									</td>
									<td><a class="btn btn-info" href="{{url('admin/editorganization?identifier='.$d->slug)}}">Edit</a>

										<a class="btn btn-danger" style="margin-top:5px;" data-confirm='Are you sure you want to delete ?' href="{{url('admin/deleteorganization?identifier='.$d->slug)}}">Delete</a></td>
								</tr>
								@endforeach

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

