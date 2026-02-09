@extends('admin._layout.master')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-fluid">
		<div class="d-flex align-items-center justify-content-between">
			<h1 class="app-page-title">{{(isset($record))?'Edit':'Add'}} Cocktail</h1>
			<div class="">
				<a class="btn app-btn-secondary" href="{{ url('admin/cocktails') }}"> Back </a>
			</div>
		</div>
		<hr class="mb-4">
		<div class="row g-4">
			<div class="col-12 col-md-9">
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-body">
						<form class="" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
							@csrf
							
							<div class="mb-3">
								<label for="created_by" class="form-label">Cocktail Created By</label>
								<input type="text" class="form-control" id="created_by" name="created_by"
									value="{{ old('created_by', $record->created_by ?? '') }}">
								@error('created_by') <span class="text-danger"> {{ $message }} </span> @enderror
							</div>
							<div class="mb-3">
								<label for="insta_user_name" class="form-label">Insta Username</label>
								<input type="text" class="form-control" id="insta_user_name" name="insta_user_name"	value="{{ old('insta_user_name', $record->insta_user_name ?? '') }}">
								@error('insta_user_name') <span class="text-danger"> {{ $message }} </span> @enderror
							</div>
							<div class="mb-3">
								<label for="cocktail_name" class="form-label">Cocktail Name</label>
								<input type="text" class="form-control" id="cocktail_name" name="cocktail_name"	value="{{ old('cocktail_name', $record->cocktail_name ?? '') }}">
								@error('cocktail_name') <span class="text-danger"> {{ $message }} </span> @enderror
							</div>
							<div class="mb-3">
								<label for="slug" class="form-label">Slug</label>
								<input type="text" class="form-control" id="slug" name="slug"	value="{{ old('slug', $record->slug ?? '') }}">
								@error('slug') <span class="text-danger"> {{ $message }} </span> @enderror
							</div>
							<div class="mb-3">
								<label for="short_desc" class="form-label">Short Description</label>
								<textarea class="form-control" id="short_desc" name="short_desc" style="height: auto;">{{ old('short_desc', $record->short_desc ?? '') }}</textarea>
								@error('short_desc') <span class="text-danger"> {{ $message }} </span> @enderror
							</div>
							<div class="mb-3">
								<label for="ingredients" class="form-label">Ingredients</label>
								<textarea class="form-control" id="ingredients" name="ingredients" rows="4" cols="30" style="height: auto;">{{ old('ingredients', $record->ingredients ?? '') }}</textarea>
							</div>
							<div class="mb-3">
								<label for="instructions" class="form-label">Instructions</label>
								<textarea class="form-control" id="instructions" name="instructions" rows="4" cols="30" style="height: auto;">{{ old('instructions', $record->instructions ?? '') }}</textarea>
							</div>
							<div class="mb-3">
								<label for="image" class="form-label">Image (482 X 482 px)</label>
								<input type="file" class="form-control" id="image" name="image">
								<input type="hidden" name="image2" value="{{ $record->image ?? '' }}">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label for="status" class="form-label">Status</label>
										<div class="form-check form-switch mb-3">
											<input class="form-check-input" type="radio" id="status" name="status" value="1" checked>
											<label class="form-check-label" for="status">Active</label>
										</div>
										<div class="form-check form-switch mb-3">
											@php
												$status = old('status', ($record->status ?? 0));
											@endphp
											<input class="form-check-input" type="radio" id="status2" name="status" value="0" {{ $status == 0 ? 'checked' : '' }} >
											<label class="form-check-label" for="status2">Inactive</label>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label for="featured" class="form-label">Featured</label>
										<div class="form-check form-switch mb-3">
											<input class="form-check-input" type="radio" id="featured" name="featured" value="1" checked>
											<label class="form-check-label" for="featured">Yes</label>
										</div>
										<div class="form-check form-switch mb-3">
											@php
												$featured = old('featured', ($record->featured ?? 0));
											@endphp
											<input class="form-check-input" type="radio" id="featured2" name="featured" value="0" {{ $featured == 0 ? 'checked' : '' }} >
											<label class="form-check-label" for="featured2">No</label>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn app-btn-primary">Save Changes</button>
							<a href="{{ url('admin/cocktails') }}" class="btn app-btn-secondary">Cancel</a>
						</form>
					</div><!--//app-card-body-->

				</div><!--//app-card-->
			</div>
			<div class="col-12 col-md-3">
				<h3 class="section-title">Uploaded Images</h3>
				<div class="card ">
					<div class="card-body">
						<div class="d-flex align-content-start flex-wrap my-2">
							@php $isImage = 0; @endphp
							@if(isset($record) && $record->image != '')
							@php $isImage = 1; @endphp
							<div class="img-box">
								<span class="cancel-icon"
									onclick="cancel_image_('tbl_cocktails','image','id', <?=$record->id?>)"><i
										class="fa-solid fa-xmark" title="Cancel"></i>
								</span>
								<img src="{{ url(IMAGE_PATH.$record->image) }}" class="" alt="...">
								<small class="image-title">CMS Banner</small>
							</div>
							@endif
							
							@if(!$isImage)
							<div class="text-center text-danger">No any image upload!</div>
							@endif
						</div>
					</div>
				</div>
			</div>

		</div><!--//row-->

	</div><!--//container-fluid-->
</div><!--//app-content-->
<script>
	tinymce.init({
		selector: '#ingredients, #instructions',
		plugins: 'advlist autolink lists link image charmap preview anchor ' +
               'searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
		toolbar: 'undo redo | formatselect | ' +
				'bold italic underline strikethrough | ' +
				'alignleft aligncenter alignright alignjustify | ' +
				'bullist numlist outdent indent | code removeformat | link image | ' +
				'forecolor backcolor | help',
		branding: false,
		block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Preformatted=pre'
	});
	document.addEventListener('DOMContentLoaded', function () {
		const serviceInput = document.getElementById('cocktail_name');
		const urlInput = document.getElementById('slug');

		if (serviceInput && urlInput) {
			serviceInput.addEventListener('keyup', function () {
				let urlval = serviceInput.value;
				let newurl = urlval
					.replace(/[_\s]+/g, '-')
					.replace(/[^a-zA-Z-]/g, '')
					.toLowerCase();

				urlInput.value = newurl;
			});
		}
	});
</script>


@endsection