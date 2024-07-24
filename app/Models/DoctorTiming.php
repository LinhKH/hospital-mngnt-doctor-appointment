<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorTiming extends Model
{
    use HasFactory;

    protected $table = 'doctor_timings';

    protected $fillable = [
        'doctor_id',
        'day',
        'shift',
        'start_time',
        'end_time',
        'avg_consultation_time'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
}
