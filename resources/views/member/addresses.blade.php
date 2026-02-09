@extends('_layouts.master')
@section('content')

<div class="container-fluid panel-space">
    <div class="row g-0 min-vh-100">

        <!-- Sidebar -->
        <div class="col-12 col-md-3 col-lg-2 bg-black text-white min-vh-100">
            @include('member.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-12 col-md-9 col-lg-10 bg-light p-4 text-dark">
            <div class="p-4">

                <!-- Heading -->
                <h4 class="fw-bold mb-4 text-uppercase">
                    My Addresses
                </h4>

                <?php if(Session::has('message')){ 
                    echo alertBS(session('message')['msg'], session('message')['type']);
                } ?>

                <div class="row g-4">

                    <!-- Saved Addresses -->
                    <div class="col-md-7">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body px-4 py-4">

                                <h5 class="fw-bold mb-3">
                                    Saved Addresses
                                </h5>

                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle text-dark">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email/Phone</th>
                                                <th>Address</th>
                                                <th style="width:100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @forelse($addresses as $index => $addr)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $addr->name.' '.$addr->last_name }}</td>
                                                    <td>{{ $addr->email.' '.$addr->phone }}</td>
                                                    <td>
                                                        <small>Address: {{ $addr->address }} </small><br>
                                                        <small>City: {{ $addr->city }} </small><br>
                                                        <small>State: {{ $addr->state }} </small><br>
                                                        <small>Zipcode: {{ $addr->zipcode }}</small><br>
                                                        <small>Landmark: {{ $addr->landmark }}</small>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('member-addresses/'.$addr->add_id) }}"
                                                           class="btn btn-sm text-white me-1"
                                                           style="background-color:#000;">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="{{ url('member-deladdress/'.$addr->add_id) }}"
                                                           class="btn btn-sm text-white"
                                                           style="background-color:red;"
                                                           onclick="return confirm('Delete this address?')">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">
                                                        No address found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Add New Address -->
                    <div class="col-md-5">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body px-4 py-4">

                                <h5 class="fw-bold mb-3">
                                    Add New Address
                                </h5>

                                <form action="{{ url()->current() }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label fw-semibold text-dark">
                                                   First Name*
                                                </label>
                                                <input type="text"
                                                    name="name"
                                                    id="name"
                                                    class="form-control"
                                                    placeholder="First name"
                                                    value="{{ old('name', $record->name ?? '') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label fw-semibold text-dark">
                                                    Last Name*
                                                </label>
                                                <input type="text"
                                                    name="last_name"
                                                    id="last_name"
                                                    class="form-control"
                                                    placeholder="Last name"
                                                    value="{{ old('last_name', $record->last_name ?? '') }}">
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label fw-semibold text-dark">
                                                    Email*
                                                </label>
                                                <input type="text"
                                                    name="email"
                                                    id="email"
                                                    class="form-control"
                                                    placeholder="Enter email"
                                                    value="{{ old('email', $record->email ?? '') }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label fw-semibold text-dark">
                                                    Phone*
                                                </label>
                                                <input type="text"
                                                    name="phone"
                                                    id="phone"
                                                    class="form-control"
                                                    placeholder="Enter phone number"
                                                    value="{{ old('phone', $record->phone ?? '') }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="city" class="form-label fw-semibold text-dark">
                                                    City*
                                                </label>
                                                <input type="text" name="city" id="city" class="form-control" placeholder="City" value="{{ old('city', $record->city ?? '') }}">
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="state" class="form-label fw-semibold text-dark">
                                                    State*
                                                </label>
                                                <input type="text" name="state" id="state" class="form-control" placeholder="state" value="{{ old('state', $record->state ?? '') }}">
                                                @error('state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="zipcode" class="form-label fw-semibold text-dark">
                                                   Zip code*
                                                </label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="zipcode" value="{{ old('zipcode', $record->zipcode ?? '') }}">
                                                @error('zipcode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="address" class="form-label fw-semibold text-dark">
                                                    Address*
                                                </label>
                                                <textarea name="address"
                                                        id="address"
                                                        rows="3"
                                                        class="form-control"
                                                        placeholder="Enter full address">{{ old('address', $record->address ?? '') }}</textarea>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="landmark" class="form-label fw-semibold text-dark">
                                                    Landmark (optional)
                                                </label>
                                                <input type="text" name="landmark" id="landmark" class="form-control" placeholder="landmark" value="{{ old('landmark', $record->landmark ?? '') }}">
                                                @error('landmark')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="alt_phone" class="form-label fw-semibold text-dark">
                                                    Alternate Phone (optional)
                                                </label>
                                                <input type="text" name="alt_phone" id="alt_phone" class="form-control" placeholder="Alternate Phone" value="{{ old('alt_phone', $record->alt_phone ?? '') }}">
                                                @error('alt_phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="text-end">
                                        <button type="submit"
                                                class="btn text-white px-4"
                                                style="background-color:#000;">
                                            Save Address
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
