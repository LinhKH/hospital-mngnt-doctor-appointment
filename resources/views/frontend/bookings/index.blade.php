@extends('layouts.app')

@section('title','Book an appointment')

@section('content')

@auth
<div class="modal fade" id="slotConfirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="slotConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="slotConfirmModalLabel">Slot Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('book-appointment/'.$doctor->slug) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="pt-5 pb-3 text-center">

                        <input type="hidden" name="book_slot_time" class="popSlotTime" />
                        <input type="hidden" name="book_slot_date" class="popSlotDate" />

                        <h2 class="fw-bold mb-3">Confirmation?</h2>
                        <h5>
                            Are you sure want to select
                            <span class="popSlotTimeFormat fw-bold">0</span> on
                            <span class="popSlotDateFormat fw-bold">0</span>?
                        </h5>

                    </div>
                    <div class="mt-2">
                        <label>Enter Patient Name *</label>
                        <input type="text" name="name" required class="form-control" value="{{ Auth::user()->name }}" placeholder="Enter Full Name" />
                    </div>
                    <div class="mt-2">
                        <label>Enter Patient Email</label>
                        <input type="text" name="email" required class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter Email Address" />
                    </div>
                    <div class="mt-2">
                        <label>Enter Patient Phone Number</label>
                        <input type="text" name="phone" required class="form-control" value="{{ Auth::user()->phone }}" placeholder="Enter Phone Number" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endauth


    <div class="banner-area">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-md-start text-center">
                        <h4 class="banner-heading">Book an appointment</h4>
                        <div class="banner-link">
                            <a href="/"> Home </a> /
                            <a href="javascript:void(0)" class="active"> Book an appointment </a>
                        </div>
                    </div>
                    <div class="col-md-5 text-md-end text-center">
                        @if ($appSetting && $appSetting->phone1)
                        <a href="tel:{{$appSetting->phone1}}" class="btn3">
                            <h5 class="mb-0 fs-4"> Call Us: {{$appSetting->phone1}}</h5>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">

            @if (!Auth::check())
            <div class="card card-body mb-4 text-center">
                <h4>
                    <a href="{{ url('/login') }}" class="btn-link">Login </a> /
                    <a href="{{ url('/register') }}" class="btn-link">Register</a>
                    to Book an Appointment.
                </h4>
            </div>
            @endif

            <div class="card p-4 border shadow mb-5">
                <div class="row">
                    <div class="col-md-2 my-auto">
                        @if ($doctor->image)
                            <img src="{{ asset($doctor->image) }}" class="view-doctor rounded-circle border" alt="Department Image" />
                        @else
                            <img src="{{ asset('assets/images/no-img.jpg') }}" class="view-doctor rounded-circle border" alt="Department Image" />
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h4 class="doctor-name mb-2">{{$doctor->name}}</h4>
                        <h6 class="doctor-designation">{{$doctor->designation}}</h6>

                        <p class="qualification-set mb-2">
                          <span class="fw-bold">Qualifications:</span> {!! $doctor->qualification !!}
                        </p>

                        <p class="qualification-set">
                            <span class="fw-bold">Specialization:</span> {!! $doctor->specialization !!}
                        </p>

                        <label class="btn mb-2 btn-secondary me-2">Consulation Fees: $ {{ $doctor->consulation_fees }}</label>
                        <a href="{{ url('/find-a-doctor') }}" class="btn mb-2 btn-1">Choose Another Doctor</a>
                    </div>
                </div>
            </div>

            @if (Auth::check())
            <div class="row">
                @foreach ($allDates as $dateItem)
                <div class="col-md-6">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3 bg-white" style="border-top: 6px solid #11a8fb;">
                            <h4 class="mb-0 fw-bold">
                                <i class="bx bx-calendar fs-3"></i>
                                {{date('F d,Y', strtotime($dateItem))}}
                                <span class="float-end btn btn-secondary fs-4"> {{date('l', strtotime($dateItem))}}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            @forelse ($doctorTiming as $docItem)
                                @if ($docItem->day == strtolower(date('l', strtotime($dateItem))))
                                    <div class="p-2 border timingBoxArea mb-3">
                                        <input type="hidden" class="slotDate" value="{{$dateItem}}" />
                                        <input type="hidden" class="slotDateFormat" value="{{date('F d,Y', strtotime($dateItem))}}" />

                                        <h5 class="fw-bold">
                                            <strong>{{ Str::upper($docItem->shift) }}</strong> :
                                            {{ date('h:i A', strtotime($docItem->start_time)) }} -
                                            {{ date('h:i A', strtotime($docItem->end_time)) }}
                                        </h5>
                                        @php
                                            $startTime = strtotime($docItem->start_time);
                                            $endTime = strtotime($docItem->end_time);
                                            $interval = 60 * $docItem->avg_consultation_time; // 30 minutes

                                            while ($startTime <= $endTime) {

                                                $time = date('H:i', $startTime);
                                                $isBooked = false;

                                                foreach ($bookedAppointments as $baItem) {
                                                    if ( $time == $baItem->appointment_time && $docItem->day == strtolower(date('l', strtotime($baItem->appointment_date))) ) {
                                                        $isBooked = true;
                                                        break;
                                                    }
                                                }
                                                if ($isBooked) {
                                                    echo "<label class='btn-booked'><input type='radio' name='time' value='$time' disabled><strike>"." ".date('h:i A', strtotime($time))."</strike></label> ";
                                                }else{
                                                    echo "<label class='btn-available'><input type='radio' name='time' class='bookSlotBtn' value='".date('h:i A', strtotime($time))."'>"." ".date('h:i A', strtotime($time))."</label> ";
                                                }

                                                $startTime += $interval;
                                            }
                                        @endphp
                                    </div>
                                @endif
                            @empty
                                <div class="p-3 border timingBoxArea mb-3">
                                    <h6 class="mb-0">No Slot Available</h6>
                                </div>
                            @endforelse

                            @if ($doctorTiming->count() > 0)
                            <div class="text-center">
                                <span class="fs-6 me-3"> <span class="available-box"></span> Available</span>
                                <span class="fs-6 ms-3"> <span class="booked-box"></span> Not Available</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $(document).on('click', '.bookSlotBtn', function () {

            var myslottime = $(this).val();
            var myslotdate = $(this).closest('.timingBoxArea').find('.slotDate').val();
            var slotDateFormat = $(this).closest('.timingBoxArea').find('.slotDateFormat').val();

            $('.popSlotTime').val(myslottime);
            $('.popSlotDate').val(myslotdate);

            $('.popSlotTimeFormat').text(myslottime);
            $('.popSlotDateFormat').text(slotDateFormat);

            $('#slotConfirmModal').modal('show');

        });
    });
</script>

@endsection

