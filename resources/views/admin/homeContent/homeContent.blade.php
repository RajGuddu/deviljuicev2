@extends('admin._layout.master')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<h1 class="app-page-title">Home Page Content</h1>
		<?php if(Session::has('message')){ 
			echo alertBS(session('message')['msg'], session('message')['type']);
		} ?>
		<hr class="mb-4">
		<div class="row g-4 settings-section">
			<div class="col-12 col-md-2">
				<h3 class="section-title">Section 2</h3>

				<div class="">
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_home_content','about_image','id', <?=$settings->id?>)"><i
								class="fa-solid fa-xmark" title="Cancel"></i>
						</span>
						<img src="{{ url(IMAGE_PATH.$settings->about_image) }}" class="" alt="...">
						<small class="image-title">About Image</small>
					</div>
					@if($settings->bg_video != '')
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_home_content','bg_video','id', {{ $settings->id }},'v')">
							<i class="fa-solid fa-xmark" title="Cancel"></i>
						</span>

						<video width="100%" height="auto" controls>
							<source src="{{ url(VIDEO_PATH.$settings->bg_video) }}" type="video/mp4">
							Your browser does not support the video tag.
						</video>

						<small class="image-title">Background Video</small>
					</div>
					@else
						<div class="text-danger">No video upload</div>
					@endif
				</div>
			</div>
			<div class="col-12 col-md-10">
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-body">
						<form class="settings-form" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="submit" value="about">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label for="bg_video" class="form-label">Background Video (mp4)</label>
										<input type="file" class="form-control" id="bg_video" name="bg_video" value="">
										<input type="hidden" class="form-control" id="bg_video2" name="bg_video2" value="{{ $settings->bg_video ?? '' }}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label for="about_title" class="form-label">Title</label>
										<input type="text" class="form-control" id="about_title" name="about_title"
											value="{{ old('about_title', $settings->about_title ?? '') }}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label for="about_details" class="form-label">Details</label>
										<textarea class="form-control" id="about_details" name="about_details">{{ old('about_details', $settings->about_details ?? '') }}</textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label for="about_image" class="form-label">Image (1600 X 1300 px)</label>
										<input type="file" class="form-control" id="about_image" name="about_image" value="">
										<input type="hidden" class="form-control" id="about_image2" name="about_image2" value="{{ $settings->about_image ?? '' }}">
									</div>
								</div>
								
								<div class="col-md-6">
									<button type="submit" class="btn app-btn-primary">Save Changes</button>
								</div>
							</div>
						</form>
					</div><!--//app-card-body-->

				</div><!--//app-card-->
			</div>
		</div><!--//row-->
		<hr class="my-4">
		<div class="row g-4 settings-section">
			<div class="col-12 col-md-2">
				<h3 class="section-title">Section 5</h3>
				<?php /* <div class="">
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_home_content','sec5_content_image1','id', <?=$settings->id?>)"><i
								class="fa-solid fa-xmark" title="Cancel"></i>
						</span>
						<img src="{{ url(IMAGE_PATH.$settings->sec5_content_image1) }}" class="" alt="...">
						<small class="image-title">Content Image1</small>
					</div>
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_home_content','sec5_content_image2','id', <?=$settings->id?>)"><i
								class="fa-solid fa-xmark" title="Cancel"></i>
						</span>
						<img src="{{ url(IMAGE_PATH.$settings->sec5_content_image2) }}" class="" alt="...">
						<small class="image-title">Content Image2</small>
					</div>
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_home_content','sec5_content_image3','id', <?=$settings->id?>)"><i
								class="fa-solid fa-xmark" title="Cancel"></i>
						</span>
						<img src="{{ url(IMAGE_PATH.$settings->sec5_content_image3) }}" class="" alt="...">
						<small class="image-title">Content Image3</small>
					</div>
				</div> */ ?>
			</div>
			<div class="col-12 col-md-10">
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-body">
						<form class="settings-form" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="submit" value="sec-5">

							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec5_title" class="form-label">Title</label>
										<input type="text" class="form-control" id="sec5_title" name="sec5_title"
											value="{{ old('sec5_title', $settings->sec5_title ?? '') }}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec5_description" class="form-label">Description</label>
										<textarea  class="form-control" id="sec5_description" name="sec5_description" rows="4" cols="30" style="height: 120px;" >{{ old('sec5_description', $settings->sec5_description ?? '') }}</textarea>
									</div>
								</div>
								
								<div class="col-md-6">
									<button type="submit" class="btn app-btn-primary">Save Changes</button>
								</div>
							</div>
						</form>

					</div><!--//app-card-body-->

				</div><!--//app-card-->
			</div>
		</div><!--//row-->
		
		<div class="row g-4 settings-section">
			<div class="col-12 col-md-2">
				<h3 class="section-title">Contact Page</h3>
				<?php /* <div class="">
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_home_content','contact_page_image','id', <?=$settings->id?>)"><i
								class="fa-solid fa-xmark" title="Cancel"></i>
						</span>
						<img src="{{ url(IMAGE_PATH.$settings->contact_page_image) }}" class="" alt="...">
						<small class="image-title">Image</small>
					</div>
				</div> */ ?>
				
			</div>
			<div class="col-12 col-md-10">
				<div class="app-card app-card-settings shadow-sm p-4">
					<div class="app-card-body">
						<form class="settings-form" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="submit" value="contact-page">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec6_title" class="form-label">Page Title</label>
										<input type="text" class="form-control" id="sec6_title" name="sec6_title" value="{{ old('sec6_title', $settings->sec6_title ?? '') }}">
									</div>
									<div class="mb-3">
										<label for="sec6_description" class="form-label">Page Description</label>
										<textarea class="form-control" id="sec6_description" name="sec6_description" style="height:120px;">{{ old('sec6_description', $settings->sec6_description ?? '') }}</textarea>
									</div>
								</div>
								
								<div class="col-md-12">
									<button type="submit" class="btn app-btn-primary">Save Changes</button>
								</div>
							</div>
						</form>
					</div><!--//app-card-body-->
				</div><!--//app-card-->
			</div>
		</div><!--//row-->
		<hr class="my-4">
	</div><!--//container-fluid-->
</div><!--//app-content-->
<script>
	tinymce.init({
		selector: '#opening_hours, #about_details',
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
</script>
@endsection