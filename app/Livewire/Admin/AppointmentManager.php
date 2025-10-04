<?php

namespace App\Livewire\Admin;

use App\Models\Speciality;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Validation\Rule;
use Livewire\Component;

use Livewire\Attributes\Computed;


class AppointmentManager extends Component
{

    public $search =[
        'date'=>'',
        'hour'=>'',
        'speciality_id'=>'',
    ];

    public $specialities =[];

    public function mount(){
        $this->specialities = Speciality::all();
    }
    
    #[Computed()]
    public function hourBlocks()
    {
        return CarbonPeriod::create(
            Carbon::createFromTimeString(config('schedule.start_time')),
            '1 hour',
            Carbon::createFromTimeString(config('schedule.end_time'))
        )->excludeEndDate();
    }

    public function searchAvailability()
    {
        $this->validate([
            'search.date'=>'required|date|after_or_equal:today',
            'search.hour'=>[
                'required',
                'date_format:H:i:s',
                Rule::when($this->search['date'] ===now()->format('Y-m-d'),[
                    'after_or_equal:'.now()->format('H:i:s'),
                ])

            ],
        ]);
    }

    public function render()
    {
        return view('livewire.admin.appointment-manager');
    }
}
