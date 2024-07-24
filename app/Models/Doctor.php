<?php

namespace App\Models;

use App\Models\User;
use App\Models\DoctorTiming;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'department_id',
        'name',
        'slug',
        'gender',
        'phone',
        'designation',
        'qualification',
        'experience',
        'specialization',
        'bio',
        'consulation_fees',
        'address',
        'image',
        'is_active',

    ];

    protected $cast = [
        'is_active' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function timings()
    {
        return $this->hasMany(DoctorTiming::class, 'doctor_id', 'id');
    }

    public function scopeIsActive()
    {
        return $this->where('is_active', 1);
    }
}
