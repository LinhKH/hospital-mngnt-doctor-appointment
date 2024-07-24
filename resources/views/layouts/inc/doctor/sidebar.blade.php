<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('admin/dashboard') }}" class="app-brand-link">
            <img src="{{ asset('assets/images/logo.png') }}" style="width: 160px" alt="Doctor Appointment" />
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    @if (!Auth::user()->is_staff)

    <ul class="menu-inner py-1">


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manage</span>
        </li>

        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('doctor/dashboard') ? 'active':'' }}">
            <a href="{{ url('doctor/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item
            @if (Request::is('doctor/appointments') || Request::is('doctor/appointments/*'))
                open active
            @endif
            ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-calendar-plus"></i>
                <div data-i18n="SubCategory">Appointments</div>
            </a>
            <ul class="menu-sub">
                {{-- <li class="menu-item @if(Request::is('doctor/appointments/create')) active @endif">
                    <a href="{{ url('doctor/appointments/create') }}" class="menu-link">
                        <div data-i18n="Without menu">Add Appointments</div>
                    </a>
                </li> --}}
                <li class="menu-item @if(Request::is('doctor/appointments')) active @endif">
                    <a href="{{ url('doctor/appointments') }}" class="menu-link">
                        <div data-i18n="Without menu">All Appointments</div>
                    </a>
                </li>
                <li class="menu-item @if(Request::is('doctor/appointments/history')) active @endif">
                    <a href="{{ url('doctor/appointments/history') }}" class="menu-link">
                        <div data-i18n="Without menu">Appointments history</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item @if (Request::is('doctor/patients') || Request::is('doctor/patients/*')) active @endif">
            <a href="{{ url('doctor/patients') }}" class="menu-link">
                <i class="menu-icon tf-iconss bx bx-user-plus"></i>
                <div data-i18n="Basic">Patients</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('doctor/profile')) active @endif">
            <a href="{{ url('doctor/profile') }}" class="menu-link">
                <i class="menu-icon tf-iconss bx bx-user"></i>
                <div data-i18n="Basic">Profile</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('doctor/timings')) active @endif">
            <a href="{{ url('doctor/timings') }}" class="menu-link">
                <i class="menu-icon tf-iconss bx bx-calendar"></i>
                <div data-i18n="Basic">Timings</div>
            </a>
        </li>
        <li class="menu-item @if (Request::is('doctor/change-password')) active @endif">
            <a href="{{ url('doctor/change-password') }}" class="menu-link">
                <i class="menu-icon tf-iconss bx bx-lock"></i>
                <div data-i18n="Basic">Change Password</div>
            </a>
        </li>

        <li class="menu-item mt-2">
            <a href="{{ asset('doctor/logout') }}" class="menu-link text-white bg-danger">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Analytics">Logout</div>
            </a>
        </li>

    </ul>

    @else

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
            <a href="{{ url('admin/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Sales</span>
        </li>


        <li class="menu-item
            @if (
                Request::is('admin/booking-enquiries') ||
                Request::is('admin/booking-enquiries-history') ||
                Request::is('admin/booking-enquiries/*') ||
                Request::is('admin/booking-enquiries-history/*') ||
                Request::is('admin/enquiries') ||
                Request::is('admin/enquiries/*')
            )
                open active
            @endif
            ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                {{-- <div data-i18n="SubCategory">Booking Enquires</div> --}}
                <div data-i18n="SubCategory">Leads</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item
                    @if (Request::is('admin/enquiries') || Request::is('admin/enquiries/*'))
                        active
                    @endif
                    ">
                    <a href="{{ url('admin/enquiries') }}" class="menu-link">
                        <div data-i18n="Without menu">Contact Enquiries</div>
                        {{-- <div data-i18n="Without menu">All Booking Enquires</div> --}}
                    </a>
                </li>
                <li class="menu-item
                    @if (Request::is('admin/booking-enquiries') || Request::is('admin/booking-enquiries/*'))
                        active
                    @endif
                    ">
                    <a href="{{ url('admin/booking-enquiries') }}" class="menu-link">
                        <div data-i18n="Without menu">Booking Enquiries</div>
                        {{-- <div data-i18n="Without menu">All Booking Enquires</div> --}}
                    </a>
                </li>
                <li class="menu-item
                    @if (Request::is('admin/booking-enquiries-history') || Request::is('admin/booking-enquiries-history/*'))
                        active
                    @endif
                    ">
                    <a href="{{ url('admin/booking-enquiries-history') }}" class="menu-link">
                        {{-- <div data-i18n="Without navbar">Booking Enquires History</div> --}}
                        <div data-i18n="Without navbar">Booking History</div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="menu-item {{ Request::is('staff/bookings/create') ? 'active':'' }}">
            <a href="{{ asset('staff/bookings/create') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Analytics">Create Custom Booking</div>
            </a>
        </li> --}}
        <li class="menu-item
            @if (Request::is('admin/bookings') ||
                Request::is('admin/bookings/*') ||
                Request::is('staff/bookings/create') ||
                Request::is('staff/bookings/create/*') ||
                Request::is('admin/bookings-history') ||
                Request::is('admin/bookings-history/*')
            )
                open active
            @endif
            ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="SubCategory">Bookings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item
                    @if (Request::is('staff/bookings/create') || Request::is('staff/bookings/create/*'))
                        active
                    @endif
                    ">
                    <a href="{{ url('staff/bookings/create') }}" class="menu-link">
                        <div data-i18n="Without menu">Create Bookings</div>
                    </a>
                </li>
                <li class="menu-item
                    @if (Request::is('admin/bookings') || Request::is('admin/bookings/*'))
                        active
                    @endif
                    ">
                    <a href="{{ url('admin/bookings') }}" class="menu-link">
                        <div data-i18n="Without menu">All Bookings</div>
                    </a>
                </li>
                <li class="menu-item
                    @if (Request::is('admin/bookings-history') || Request::is('admin/bookings-history/*'))
                        active
                    @endif">
                    <a href="{{ url('admin/bookings-history') }}" class="menu-link">
                        <div data-i18n="Without navbar">Booking History</div>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="menu-item
            @if (Request::is('admin/enquiries') || Request::is('admin/enquiries/*'))
                active
            @endif
            ">
            <a href="{{ url('admin/enquiries') }}" class="menu-link">
                <i class="menu-icon tf-iscons bx bx-support"></i>
                <div data-i18n="Basic">Enquires</div>
            </a>
        </li> --}}
        <li class="menu-item {{ Request::is('admin/brochure-customers') ? 'active':'' }}">
            <a href="{{ url('admin/brochure-customers') }}" class="menu-link">
                <i class="menu-icon tf-iscons bx bx-user"></i>
                <div data-i18n="Basic">Brochure Customers</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manage</span>
        </li>

        <li class="menu-item {{ Request::is('admin/add-sub-category') ? 'active':'' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="SubCategory">Sub Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('admin/add-sub-category') }}" class="menu-link">
                        <div data-i18n="Without menu">Add Sub Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('admin/sub-categories') }}" class="menu-link">
                        <div data-i18n="Without navbar">View Sub Categories</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-iconss bx bxl-product-hunt"></i>
                <div data-i18n="Packages">Packages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('admin/tour-packages/create') }}" class="menu-link">
                        <div data-i18n="Without menu">Add Package</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('admin/tour-packages') }}" class="menu-link">
                        <div data-i18n="Without navbar">View Packages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('admin/tour-packages/customize') }}" class="menu-link">
                        <div data-i18n="Without navbar">Customize Packages</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('admin/tour-package-types') }}" class="menu-link">
                        <div data-i18n="Without navbar">Tour Package Type</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('admin/users') ? 'active':'' }}">
            <a href="{{ url('admin/users') }}" class="menu-link">
                <i class="menu-icon tf-iscons bx bx-user"></i>
                <div data-i18n="Basic">Registered Customers</div>
            </a>
        </li>

    </ul>

    @endif

</aside>
