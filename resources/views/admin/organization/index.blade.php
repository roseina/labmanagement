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
		<h1 class="page-header">Organization</h1>
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
								<td>@if($d->logo!= '' && file_exists(public_path('uploads/organizations/logos' .$d->logo)))

            <img src= {{URL::asset('uploads/organizations/logos'.$d->logo)}} width="100" height="200">
            @else  <img src= {{URL::asset('backend/image-resources/image_notfound.png')}} width="100" height="100">@endif</td>
								<td>@if($d->image!= '' && file_exists(public_path('uploads/organizations/images' .$d->image)))

            <img src= {{URL::asset('uploads/organizations/images'.$d->image)}} width="100" height="200">
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

										<a class="btn btn-danger" style="margin-top:5px;">Delete</a></td>
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


	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
	</script>
	@endsection

