@extends('admin._layout.master')
@section('content')
@php
	use App\Models\ServiceVariantsModel;
@endphp
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-fluid">

		<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
				<h1 class="app-page-title mb-0">Cocktails</h1>
			</div>
			<div class="col-auto">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						<div class="col-auto">
							<form action="{{ url()->current() }}" method="post" class="table-search-form row gx-1 align-items-center" >
								@csrf
								<div class="col-auto">
									<input type="text" id="search-orders" name="search" value="{{ $_POST['search'] ?? '' }}"
										class="form-control search-orders" placeholder="Search">
								</div>
								<div class="col-auto">
									<button type="submit" class="btn app-btn-secondary">Search</button>
								</div>
							</form>

						</div><!--//col-->
						<div class="col-auto">
							<a class="btn app-btn-secondary" href="{{ url('admin/cocktails') }}"> Refresh </a>
						</div>
						<div class="col-auto">
							<a class="btn app-btn-secondary" href="{{ url('admin/add_edit_cocktail') }}"> Add </a>
							
						</div>
						
					</div><!--//row-->
				</div><!--//table-utilities-->
			</div><!--//col-auto-->
		</div><!--//row-->
		<?php if(Session::has('message')){ 
			echo alertBS(session('message')['msg'], session('message')['type']);
		} ?>

		<div class="app-card app-card-orders-table shadow-sm mb-5">
			<div class="app-card-body">
				<div class="table-responsive">
					<table class="table app-table-hover mb-0 text-left">
						<thead>
							<tr>
								<th >#</th>
								<th >Created By</th>
								<th >Insta Username</th>
								<th>Cocktail Name</th>
								<th >Description</th>
								<th >Image</th>
								<th >Featured</th>
								<th >Status</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
							@if(!empty($records))
							@php $n = 1; @endphp
							@foreach($records as $list)
							@php if($list->status == 1){
								$status = '<span class="badge bg-success">Active</span>';
							}else{
								$status = '<span class="badge bg-danger">Inactive</span>';
							} 
							$img = ''; 
							if($list->image != '')
								$img = $list->image;
							@endphp
							<?php $featured = '<span class="badge bg-warning">No</span>'; ?>
							@if($list->featured == 1)
								@php $featured = '<span class="badge bg-success">Yes</span>'; @endphp
							@endif
							<tr>
								<td class="cell">{{ $n++ }}</td>
								<td class="cell">{{ $list->created_by }}</td>
								<td class="cell">{{ $list->insta_user_name }}</td>
								<td class="cell">{{ $list->cocktail_name }}</td>
								<td class="cell">{{ substr(strip_tags($list->short_desc),0,50).'...' }}</td>
								<td class="cell">
									@if($img != '')
									<img src="{{ url(IMAGE_PATH.$img) }}" alt="cms-banner" width="100px" height="60px">
									@else
										{{ '--' }}
									@endif
								</td>
								<td class="cell">{!! $featured !!}</td>
								<td class="cell">{!! $status !!}</td>
								<td class="cell">
									<!-- <a class="btn-sm app-btn-secondary" href="#">View</a> -->
									<a class="btn-sm app-btn-secondary" href="{{ url('admin/add_edit_cocktail/'.$list->id) }}">Edit</a>
									<a class="btn-sm app-btn-secondary" onclick="return confirm('Are u sure?')" href="{{ url('admin/delete_cocktail/'.$list->id) }}">Delete</a>
									<?php /* <a class="btn-sm app-btn-secondary" href="{{ url('admin/variants/'.$list->id) }}">Variants</a> */ ?>
								</td>
							</tr>
							@endforeach
							
							@else
							<tr><td colspan="8" class="text-danger text-center">No Record Available!</td></tr>
							@endif

						</tbody>
					</table>
				</div><!--//table-responsive-->

			</div><!--//app-card-body-->
		</div><!--//app-card-->

	</div><!--//container-fluid-->
</div><!--//app-content-->
@endsection