<div class="app-card app-card-orders-table shadow-sm p-4">
    <div class="app-card-body">
        <form class="" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tab" value="tab2">
            <input type="hidden" name="pro_id" value="{{ $record->pro_id ?? '' }}">
            @error('pro_id') <span class="text-danger"> {{ $message }} </span> @enderror
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control" id="details" name="details" rows="4" cols="30"
                    style="height: auto;">{{ old('details', $record->details ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="30"
                    style="height: auto;">{{ old('description', $record->description ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="additional_info" class="form-label">Additional Info</label>
                <textarea class="form-control" id="additional_info" name="additional_info" rows="4" cols="30"
                    style="height: auto;">{{ old('additional_info', $record->additional_info ?? '') }}</textarea>
            </div>
           
            <button type="submit" class="btn app-btn-primary">Save Changes</button>
            <a href="{{ url('admin/products') }}" class="btn app-btn-secondary">Cancel</a>
        </form>

    </div><!--//app-card-body-->
</div><!--app-card-->

<script>
	tinymce.init({
		selector: '#details, #description, #additional_info',
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