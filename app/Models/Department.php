<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active'
    ];

    protected $cast = [
        'is_active' => 'boolean'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'department_id', 'id')->where('is_active', 1);
    }
}
