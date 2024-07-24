<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use App\Enums\AppointmentStatusEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "appointments";

    protected $fillable = [
        'user_id',
        'doctor_id',
        'appointment_number',
        'appointment_date',
        'appointment_time',
        'name',
        'email',
        'phone',
        'consulation_fees',
        'consulation_fees_status',
        'user_comment',
        'doctor_comment',
        'status',
    ];

    protected $casts = [
        'status' => AppointmentStatusEnum::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function scopeAutheDoctor()
    {
        $doctorId = Doctor::where('user_id', Auth::user()->id)->pluck('id');
        return $this->where('doctor_id', $doctorId);
    }
}
