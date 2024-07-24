<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6 col-lg-3">
                <h3 class="heading">About Us</h3>
                <p>
                    HotDoc is Australia's largest and most
                        trusted patient engagement platform with over 21,000 listed doctors and 8 million active patients
                </p>
                <a href="{{ url('about-us') }}" class="">read more</a>

                <h3 class="heading">Follow Us</h3>
                <p class="social-media">
                    <a href=""> <i class="bx bxl-facebook"></i></a>
                    <a href=""> <i class="bx bxl-twitter"></i></a>
                    <a href=""> <i class="bx bxl-instagram"></i></a>
                    <a href=""> <i class="bx bxl-youtube"></i></a>
                    <a href=""> <i class="bx bxl-linkedin"></i></a>
                </p>
            </div>
            <div class="col-md-3 col-6 col-lg-3">
                <h3 class="heading">Quick Link</h3>
                <ul class="contact-links footer-links">
                    <li><a href="{{ url('/') }}" class="contact-link"> <i class="bx bx-chevron-right"></i> Home</a></li>
                    <li><a href="{{ url('about-us') }}" class="contact-link"> <i class="bx bx-chevron-right"></i> About Us</a></li>
                    <li><a href="{{ url('find-a-doctor') }}" class="contact-link"> <i class="bx bx-chevron-right"></i> Find a doctor</a></li>
                    <li><a href="{{ url('/contact-us') }}" class="contact-link"> <i class="bx bx-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-5 col-lg-3">
                <h3 class="heading">CONTACT US</h3>
                @if ($appSetting && $appSetting->address)
                <p class="me-4">
                    {{$appSetting->address}}
                </p>
                @endif
                @if ($appSetting && $appSetting->whatsapp)
                <p class="me-4">
                    <i class="bx bxl-whatsapp"></i>
                    {{$appSetting->whatsapp}}
                </p>
                @endif
                <ul class="contact-links footer-links">
                    <li><a href="{{ url('find-a-doctor') }}" class="contact-link"> <i class="bx bx-chevron-right"></i> Find a doctor</a></li>
                    <li><a href="{{ url('/contact-us') }}" class="contact-link"> <i class="bx bx-chevron-right"></i> Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-7 col-lg-3">
                <div class="footer-contact">
                    <h3 class="heading">Reach Us</h3>
                    <ul class="contact-links">
                        @if ($appSetting && $appSetting->phone1)
                        <li>
                            <a href="tel:{{$appSetting->phone1}}" title="Call us" class="contact-link">
                                <i class="bx bx-phone-call"></i>
                                <span class="link-text">{{$appSetting->phone1}}</span>
                            </a>
                        </li>
                        @endif
                        @if ($appSetting && $appSetting->phone2)
                        <li>
                            <a href="tel:{{$appSetting->phone2}}" title="Call us" class="contact-link">
                                <i class="bx bx-phone-call"></i>
                                <span class="link-text">{{$appSetting->phone2}}</span>
                            </a>
                        </li>
                        @endif
                        @if ($appSetting && $appSetting->email1)
                        <li>
                            <a href="mailto:{{$appSetting->email1}}" title="Call us" class="contact-link">
                                <i class="bx bx-envelope"></i>
                                <span class="link-text">{{$appSetting->email1}}</span>
                            </a>
                        </li>
                        @endif
                        @if ($appSetting && $appSetting->email2)
                        <li>
                            <a href="mailto:{{$appSetting->email2}}" title="Call us" class="contact-link">
                                <i class="bx bx-envelope"></i>
                                <span class="link-text">{{$appSetting->email2}}</span>
                            </a>
                        </li>
                        @endif
                        @if ($appSetting && $appSetting->fax)
                        <li>
                            <a href="mailto:{{$appSetting->fax}}" title="Call us" class="contact-link">
                                <i class="bx bx-file"></i> FAX:
                                <span class="link-text">{{$appSetting->fax}}</span>
                            </a>
                        </li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr class="text-white">
    </div>
    <div class="container mt-md-5 mt-3">
        <div class="row">
            <div class="col-md-6 text-md-start text-center">
                <p class="mb-0 fs-12">{{ $appSetting->copyright ?? 'Copyright - 2023' }}.</p>
            </div>
            <div class="col-md-6">
                <p class="mb-0 fs-12 text-md-end text-center">
                    Design &amp; Developed by -
                    <a href="https://news-portal.shop/" target="_blank" class="text-white">Linh Dev</a>
                </p>
            </div>
        </div>
    </div>
</div>

