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
                    Edit Profile
                </h4>

                <?php if(Session::has('message')){ 
                    echo alertBS(session('message')['msg'], session('message')['type']);
                } ?>

                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body px-4 py-4">

                        <form action="{{ url()->current() }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold text-dark">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="{{ old('name', $user->name ?? '') }}">
                                <input type="hidden" name="name2" value="{{ $user->name ?? '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-dark">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email', $user->email ?? '') }}">
                                <input type="hidden" name="email2" value="{{ $user->email ?? '' }}">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold text-dark">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone', $user->phone ?? '') }}">
                                <input type="hidden" name="phone2" value="{{ $user->phone ?? '' }}">
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn text-white px-4" style="background-color:#000;">
                                    Save Changes
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
