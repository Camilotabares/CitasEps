<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Doctor;

class ScheduleManager extends Component
{

    public Doctor $doctor;

    public $schedule = [];
    
    public function render()
    {
        return view('livewire.admin.schedule-manager');
    }
}
