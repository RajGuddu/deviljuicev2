<div class="app-card app-card-orders-table shadow-sm p-4">
    <div class="app-card-body">
        <form class="" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tab" value="tab3">
            <input type="hidden" name="pro_id" value="{{ $record->pro_id ?? '' }}">
            @error('pro_id') <span class="text-danger"> {{ $message }} </span> @enderror
            <?php /* <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr>
                            <th class="cell">#</th>
                            <th class="cell">Value</th>
                            <th class="cell">Unit</th>
                            <th class="cell">SP($)</th>
                            <th class="cell">Status</th>
                            <th class="cell">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($attributes) && $attributes->isNotEmpty())
                        @php $n = 1; @endphp
                        @foreach($attributes as $list)
                        @php if($list->status == 1){
                            $status = '<span class="badge bg-success">Active</span>';
                        }else{
                            $status = '<span class="badge bg-danger">Inactive</span>';
                        } 
                        
                        @endphp
                        <tr>
                            <td class="cell">{{ $n++ }}</td>
                            <td class="cell">{{ $list->value }}</td>
                            <td class="cell">{{ $list->unit }}</td>
                            <td class="cell">${{ $list->sp }}</td>
                            <?php /* <td class="cell">{{ substr(strip_tags($list->description),0,50).'...' }}</td> *
                            <td class="cell">{!! $status !!}</td>
                            <td class="cell">
                                <!-- <a class="btn-sm app-btn-secondary" href="#">View</a> -->
                                <a class="btn-sm app-btn-secondary" href="{{ url('admin/add_edit_product/'.$record->pro_id.'/'.$list->attrId) }}">Edit</a>
                                <a class="btn-sm app-btn-secondary" onclick="return confirm('Are u sure?')" href="{{ url('admin/delete_attr/'.$record->pro_id.'/'.$list->attrId) }}">Delete</a>
                                <?php /* <a class="btn-sm app-btn-secondary" href="{{ url('admin/variants/'.$list->id) }}">Variants</a> *
                            </td>
                        </tr>
                        @endforeach
                        
                        @else
                        <tr><td colspan="5" class="text-danger text-center">No Record Available!</td></tr>
                        @endif
                        

                    </tbody>
                </table>
            </div><!--//table-responsive--> */ ?>

            <p class="my-2" style="color:blue">{{ isset($record)?'Edit':'Add' }} Price & Discount</p>
            <?php /* <div class="mb-3">
                <label for="value" class="form-label">Value(20, 30, 60, 100, 200, etc)</label>
                <input type="text" class="form-control" id="value" name="value"
                    value="{{ old('value', $attr->value ?? '') }}">
                @error('value') <span class="text-danger"> {{ $message }} </span> @enderror
            </div>
             */ ?>
            
            <div class="mb-3">
                <label for="sp" class="form-label">Sp(Sales Price in $)</label>
                <input type="text" class="form-control" id="sp" name="sp"
                    value="{{ old('sp', $record->sp ?? '') }}">
                @error('sp') <span class="text-danger"> {{ $message }} </span> @enderror
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount or Save</label><br>
                <small class="text-danger">If the discount or save is entered here, the price will not be displayed on the front panel.</small>
                <input type="text" class="form-control" id="discount" name="discount"
                    value="{{ old('discount', $record->discount ?? '') }}">
                @error('discount') <span class="text-danger"> {{ $message }} </span> @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock"
                    value="{{ old('stock', $record->stock ?? '') }}">
                @error('stock') <span class="text-danger"> {{ $message }} </span> @enderror
            </div>
            <?php /* <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="radio" id="status" name="status" value="1" checked>
                    <label class="form-check-label" for="status">Active</label>
                </div>
                <div class="form-check form-switch mb-3">
                    @php
                        $status = old('status', ($attr->status ?? ''));
                    @endphp
                    <input class="form-check-input" type="radio" id="status2" name="status" value="0" {{ $status == 0 ? 'checked' : '' }} >
                    <label class="form-check-label" for="status2">Inactive</label>
                </div>
            </div> */ ?>
            
            <button type="submit" class="my-2 btn app-btn-primary">Save Changes</button>
            <a href="{{ url('admin/products') }}" class="btn app-btn-secondary">Cancel</a>
        </form>

    </div><!--//app-card-body-->
</div><!--app-card-->