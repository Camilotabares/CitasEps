<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $fillable = [
        'doctor_id',
        'date_of_week',
        'start_time',
        // 'end_time',
    ];

    protected $casts = [

        'date_of_week' => 'integer',
        'start_time' => 'datetime',
        // 'end_time' => 'datetime',
    ];
    //Relacion inversa
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
