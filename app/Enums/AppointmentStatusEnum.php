<?php

namespace App\Enums;

enum AppointmentStatusEnum:string {

    case Booked = 'booked';
    case Completed = 'completed';
    case Cancel = 'cancel';
    case NotAvailable = 'not_available';
}
