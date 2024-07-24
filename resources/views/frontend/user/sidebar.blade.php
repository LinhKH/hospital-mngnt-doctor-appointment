<h5 class="mb-3">
    Hello
    <span class="text-primary">{{ Auth::user()->name }}.</span>
</h5>

<div class="card mb-3">
    <div class="card-header">
        <h4 class="mb-0">Quick Links</h4>
    </div>
    <div class="card-body">
        <ul class="user-sidebar">
            <li class=" {{ Request::is('user/appointments') ? 'side_active' : '' }} ">
                <a href="{{ url('user/appointments') }}"><i class="bx bx-list-check"></i> My Appointments</a>
            </li>
            <li class=" {{ Request::is('user/profile') ? 'side_active' : '' }} ">
                <a href="{{ url('user/profile') }}"><i class="bx bx-user"></i> My Profile</a>
            </li>
            <li class=" {{ Request::is('user/change-password') ? 'side_active' : '' }} ">
                <a href="{{ url('user/change-password') }}"><i class="bx bx-lock"></i> Change Password</a>
            </li>
            <li class=" {{ Request::is('user/support') ? 'side_active' : '' }} ">
                <a href="{{ url('user/support') }}"><i class="bx bx-phone-call"></i> Support</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="bx bx-log-out"></i>
                    <span class="align-middle">Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
<style>
    .side_active {
        background-color: #007bff;
    }
</style>
