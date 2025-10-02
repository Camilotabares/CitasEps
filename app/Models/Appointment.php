<?php

namespace App\Models;

use App\Enums\AppointmentEnum;
use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'date',
        'start_time',
        'end_time',
        'duration',
        'reason',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'status' => AppointmentEnum::class,
    ];

    Public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    Public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}