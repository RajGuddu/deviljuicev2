<div class="app-card app-card-orders-table shadow-sm p-4">
    <div class="app-card-body">
        <form class="" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tab" value="tab4">
            <input type="hidden" name="pro_id" value="{{ $record->pro_id ?? '' }}">
            @error('pro_id') <span class="text-danger"> {{ $message }} </span> @enderror

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="show_front" class="form-label me-4">Show on front: </label>
                        <div class="form-check-inline form-switch mb-3">
                            <input class="form-check-input" type="radio" id="show_front" name="show_front" value="1" checked>
                            <label class="form-check-label" for="show_front">Yes</label>
                        </div>
                        <div class="form-check-inline form-switch mb-3">
                            @php
                                $status = old('show_front', ($record->show_front ?? ''));
                            @endphp
                            <input class="form-check-input" type="radio" id="show_front2" name="show_front" value="0" {{ $status == 0 ? 'checked' : '' }} >
                            <label class="form-check-label" for="show_front2">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @php
                        $status = old('is_comming', ($record->is_comming ?? ''));
                    @endphp
                    <div class="mb-3">
                        <label for="is_comming" class="form-label me-4">Is coming shown?: </label>
                        <div class="form-check-inline form-switch mb-3">
                            <input class="form-check-input" type="radio" id="is_comming" name="is_comming" value="1" {{ $status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_comming">Yes</label>
                        </div>
                        <div class="form-check-inline form-switch mb-3">
                            
                            <input class="form-check-input" type="radio" id="is_comming2" name="is_comming" value="0" {{ $status == 0 ? 'checked' : '' }} >
                            <label class="form-check-label" for="is_comming2">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="status" class="form-label me-4">Status: </label>
                        <div class="form-check-inline form-switch mb-3">
                            <input class="form-check-input" type="radio" id="status" name="status" value="1" checked>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <div class="form-check-inline form-switch mb-3">
                            @php
                                $status = old('status', ($record->status ?? ''));
                            @endphp
                            <input class="form-check-input" type="radio" id="status2" name="status" value="0" {{ $status == 0 ? 'checked' : '' }} >
                            <label class="form-check-label" for="status2">Inactive</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="my-2 btn app-btn-primary">Save Changes</button>
            <a href="{{ url('admin/products') }}" class="btn app-btn-secondary">Cancel</a>
        </form>

    </div><!--//app-card-body-->
</div><!--app-card-->