@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <div class="banner-area">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-md-start text-center">
                        <h4 class="banner-heading">About Us</h4>
                        <div class="banner-link">
                            <a href="/"> Home </a> /
                            <a href="javascript:void(0)" class="active"> About Us </a>
                        </div>
                    </div>
                    <div class="col-md-5 text-md-end text-center">
                        @if ($appSetting && $appSetting->phone1)
                            <a href="tel:{{ $appSetting->phone1 }}" class="btn3">
                                <h5 class="mb-0 fs-4"> Call Us: {{ $appSetting->phone1 }}</h5>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="heading">About Us</h4>
                    <div class="underline"></div>
                    <h4 class="elementor-heading-title elementor-size-default">HotDoc is Australia's largest and most
                        trusted patient engagement platform with over 21,000 listed doctors and 8 million active patients
                    </h4>
                    <div class="elementor-widget-container">
                        <p><span style="font-weight: 400;">Nearly 1 in 3 Australians use HotDoc to connect with their
                                preferred doctor. Patients use the platform to book online and better manage their (and
                                their family’s) health. </span><span style="font-weight: 400;">While practices and
                                practitioners use </span><span style="font-weight: 400;">HotDoc as an all-in-one solution to
                                connect with new and existing patients.</span></p>
                        <p><span style="font-weight: 400;">At our core, our mission is to improve the health care experience
                                for everyone in Australia. We do this by giving clinics access to online bookings,
                                telehealth, appointment reminders, SMS recalls for clinical reminders and results, mobile
                                and kiosk check-in, digital new patient registration forms, online prescription renewals,
                                and tools for encouraging preventative health.</span></p>
                    </div>
                    <div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-21de12f exad-sticky-section-no exad-glass-effect-no elementor-widget elementor-widget-heading" data-id="21de12f" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">The HotDoc Promise</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-d5ec4b1 exad-sticky-section-no exad-glass-effect-no elementor-widget elementor-widget-text-editor" data-id="d5ec4b1" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<p>Our team works hard to help our customers improve patient engagement and deliver better health outcomes. Living our values helps us make sure that our products and services promote quality healthcare for both clinics and patients.</p>						</div>
				</div>
				<div class="elementor-element elementor-element-283023a list-dots exad-sticky-section-no exad-glass-effect-no elementor-widget elementor-widget-text-editor" data-id="283023a" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<ul><li><p class="p1">We will never endorse non evidence-based health services on our platform</p></li><li><p class="p1">We will never knowingly undermine continuity of care</p></li><li><p class="p1">We will foster a company-wide ethos that prevention is better than cure</p></li><li><p class="p1">We will transparently reveal the results of any clinical initiative we undertake irrespective of whether they support or hinder our business goals</p></li><li><p class="p1">We will respect the privacy of patient details and maintain strict confidentiality of any patient information that we handle</p></li><li><p class="p1">We will closely scrutinise every decision we make to ensure they reflect each of our values</p><p class="p1">&nbsp;</p></li></ul>						</div>
				</div>
				<div class="elementor-element elementor-element-d64bd6e exad-sticky-section-no exad-glass-effect-no elementor-widget elementor-widget-text-editor" data-id="d64bd6e" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<p>If your practice is looking to build patient relationships and improve your efficiency, you should ask any potential provider if they can make the same promises.</p><p>&nbsp;</p><p>If you have any questions about our values and how HotDoc can help your practice, contact us on 1300 468 362 or email us at&nbsp;<a href="mailto:hello@hotdoc.com.au">hello@hotdoc.com.au</a>.</p>						</div>
				</div>
					</div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/doctor.jpg') }}" class="w-100 shadow-sm" alt="About Us" />
                </div>
            </div>
        </div>
    </div>
@endsection
