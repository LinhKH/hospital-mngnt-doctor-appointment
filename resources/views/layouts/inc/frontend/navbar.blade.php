<div class="sticky-top shadow">
    <div class="bg-l-blue top-navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-center text-md-start">
                    @if ($appSetting && $appSetting->phone1)
                    <a href="tel:{{ $appSetting->phone1 }}"> <i class="bx bx-phone"></i> Call Us: {{ $appSetting->phone1 }}</a> |
                    @endif
                    @if ($appSetting && $appSetting->phone2)
                    <a href="tel:{{ $appSetting->phone2 }}"> <i class="bx bx-phone"></i> {{ $appSetting->phone2 }}</a> |
                    @endif
                    @if ($appSetting && $appSetting->email1)
                    <a href="mailto:{{$appSetting->email1}}" class="d-none d-md-inline-block"><i class="bx bx-envelope"></i> Email Us: {{$appSetting->email1}}</a>
                    @endif
                </div>
                <div class="col-md-5 text-center text-md-end">
                    <a href="{{ url('/contact-us') }}">Contact Us</a>
                    <a href="{{ url('/user/appointments') }}"><i class="bx bx-calendar-plus"></i> My Appointments</a>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg border-top">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                @if ($appSetting && $appSetting->image)
                    <img src="{{ asset($appSetting->image) }}" class="logo-img" alt="logo">
                @else
                    <img src="{{ asset('assets/images/logo.png') }}" class="logo-img" alt="logo">
                @endif
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('departments*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('departments') }}">Departments</a>
                    </li>
                    <li class="nav-item {{ Request::is('find-a-doctor*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('find-a-doctor') }}">Find A Doctor</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                    </li> --}}
                    <li class="nav-item {{ Request::is('book-appointment*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('book-appointment') }}">Book Appointment</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link border dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bx bx-user"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('user/profile') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('user/appointments') }}">
                                    {{ __('Appointments') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
