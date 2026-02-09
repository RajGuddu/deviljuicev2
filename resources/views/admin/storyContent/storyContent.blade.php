@extends('admin._layout.master')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<h1 class="app-page-title">The Story Page Content</h1>
		<?php if(Session::has('message')){ 
			echo alertBS(session('message')['msg'], session('message')['type']);
		} ?>
		<hr class="mb-4">
		<div class="row g-4 settings-section">
			
			<div class="col-12 col-md-10">
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-body">
						<form class="settings-form" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="submit" value="about">
							<div class="row">
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
										<label for="bg_video" class="form-label">Background Video</label>
										<input type="file" class="form-control" id="bg_video" name="bg_video" value="">
										<input type="hidden" class="form-control" id="bg_video2" name="bg_video2" value="{{ $settings->bg_video ?? '' }}">
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
			<div class="col-12 col-md-2">
				<h3 class="section-title">Section 1</h3>
				
				@if($settings->bg_video != '')
				<div class="img-box">
					<span class="cancel-icon"
						onclick="cancel_image_('tbl_story_content','bg_video','id', {{ $settings->id }},'v')">
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
		</div><!--//row-->
		<hr class="my-4">
		<div class="row g-4 settings-section">
			
			<div class="col-12 col-md-10">
				<div class="app-card app-card-settings shadow-sm p-4">

					<div class="app-card-body">
						<form class="settings-form" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="submit" value="sec-2">

							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec2_title" class="form-label">Title</label>
										<input type="text" class="form-control" id="sec2_title" name="sec2_title"
											value="{{ old('sec2_title', $settings->sec2_title ?? '') }}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec2_description" class="form-label">Description</label>
										<textarea  class="form-control" id="sec2_description" name="sec2_description" rows="4" cols="30">{{ old('sec2_description', $settings->sec2_description ?? '') }}</textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec2_image1" class="form-label">Sec-2 Image1</label>
										<input type="file" class="form-control" id="sec2_image1" name="sec2_image1" value="">
										<input type="hidden" class="form-control" id="sec2_image1_2" name="sec2_image1_2" value="{{ $settings->sec2_image1 ?? '' }}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec2_image2" class="form-label">Sec-2 Image2</label>
										<input type="file" class="form-control" id="sec2_image2" name="sec2_image2" value="">
										<input type="hidden" class="form-control" id="sec2_image2_2" name="sec2_image2_2" value="{{ $settings->sec2_image2 ?? '' }}">
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
			<div class="col-12 col-md-2">
				<h3 class="section-title">Section 2</h3>
				<div class="">
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_story_content','sec2_image1','id', <?=$settings->id?>)"><i
								class="fa-solid fa-xmark" title="Cancel"></i>
						</span>
						<img src="{{ url(IMAGE_PATH.$settings->sec2_image1) }}" class="" alt="...">
						<small class="image-title">Sec2 Image1</small>
					</div>
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_story_content','sec2_image2','id', <?=$settings->id?>)"><i
								class="fa-solid fa-xmark" title="Cancel"></i>
						</span>
						<img src="{{ url(IMAGE_PATH.$settings->sec2_image2) }}" class="" alt="...">
						<small class="image-title">Sec2 Image2</small>
					</div>
					
				</div>
			</div>
		</div><!--//row-->
		<hr class="my-4">
		<div class="row g-4 settings-section">
			
			<div class="col-12 col-md-10">
				<div class="app-card app-card-settings shadow-sm p-4">
					<div class="app-card-body">
						<form class="settings-form" autocomplete="off" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="submit" value="sec-3">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label for="sec3_bg_video" class="form-label">Section-3 Background Video</label>
										<input type="file" class="form-control" id="sec3_bg_video" name="sec3_bg_video" value="">
										<input type="hidden" class="form-control" name="sec3_bg_video_2" value="{{ $settings->sec3_bg_video ?? '' }}">
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
			<div class="col-12 col-md-2">
				<h3 class="section-title">Section 3</h3>
				<div class="">
					@if($settings->sec3_bg_video != '')
					<div class="img-box">
						<span class="cancel-icon"
							onclick="cancel_image_('tbl_story_content','sec3_bg_video','id', {{ $settings->id }},'v')">
							<i class="fa-solid fa-xmark" title="Cancel"></i>
						</span>

						<video width="100%" height="auto" controls>
							<source src="{{ url(VIDEO_PATH.$settings->sec3_bg_video) }}" type="video/mp4">
							Your browser does not support the video tag.
						</video>

						<small class="image-title">Background Video</small>
					</div>
					@else
						<div class="text-danger">No video upload</div>
					@endif
					
				</div>

			</div>
		</div><!--//row-->
		
	</div><!--//container-fluid-->
</div><!--//app-content-->
<script>
	tinymce.init({
		selector: '#about_details, #sec2_description',
		height: 300,
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