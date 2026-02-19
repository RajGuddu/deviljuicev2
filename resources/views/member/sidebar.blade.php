<div class="d-flex flex-column mt-4 p-3 text-white bg-black">

    <h5 class="mb-3">Welcome, {{ ucwords(session('m_name')) }}</h5>
    @if(session('m_phone') != '')
        <p class="small mb-4 text-light">{{ session('m_phone') }}</p>
    @endif
    @php $seg1 = request()->segment(1); @endphp

    <nav class="nav flex-column member-sidebar">
        <a href="{{ url('member-dashboard') }}" class="nav-link text-light mb-1 {{ ($seg1 == 'member-dashboard')?'m-active':'' }}">Dashboard</a>
        <a href="{{ url('member-orders') }}" class="nav-link text-light mb-1 {{ ($seg1 == 'member-orders')?'m-active':'' }}">My Orders</a>
        <!-- <a href="{{ url('member-courses') }}" class="nav-link text-light  mb-1">My Courses</a> -->
        <a href="{{ url('member-addresses') }}" class="nav-link text-light mb-1 {{ ($seg1 == 'member-addresses')?'m-active':'' }}">My Addresses</a>
        <a href="{{ url('member-profile') }}" class="nav-link text-light mb-1 {{ ($seg1 == 'member-profile')?'m-active':'' }}">Profile</a>
        <a href="{{ url('member-changepassword') }}" class="nav-link text-light mb-4 {{ ($seg1 == 'member-changepassword')?'m-active':'' }}">Change Password</a>
        <a href="{{ url('member-logout') }}" class="nav-link text-light mb-0 mb-md-4" onclick="return confirm('Are you sure?')">Logout</a>
    </nav>
</div>
