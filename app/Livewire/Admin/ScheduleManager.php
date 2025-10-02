<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Doctor;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Attributes\Computed;

class ScheduleManager extends Component
{

    public Doctor $doctor;

    public $schedule = [];

    public $days =[];

    public $apointment_duration; // se le asigna en config.schedule.php el valor de 15
    public $start_time ; // se le asigna en config.schedule.php el valor de 08:00:00
    public $end_time ; //se le asigna en  config.schedule.php el valor de 18:00:00

    public $intervals;

    #[Computed()]
    public function hourBlocks()
    {
        return CarbonPeriod::create(
            Carbon::createFromTimeString($this->start_time),
            '1 hour',
            Carbon::createFromTimeString($this->end_time)
        )->excludeEndDate();
    }

    public function mount()
    {
        $this->apointment_duration = config('schedule.appointment_duration');
        $this->days = config('schedule.days');
        $this->start_time = config('schedule.start_time');
        $this->end_time = config('schedule.end_time');
        $this->intervals =60 / $this->apointment_duration;
        $this->initializeSchedule();

    }


    public function initializeSchedule()

    {
        $schedules = $this ->doctor->schedules;
        
        
        foreach($this->hourBlocks as $hourBlock){
            $period = CarbonPeriod::create(
                $hourBlock->copy(),
                $this->apointment_duration.'minutes',
                $hourBlock->copy()->addHour()
            );

            foreach ($period as $time) {

                foreach($this->days as $index => $day){
                    
                    $this->schedule[$index][$time->format('H:i:s')] = $schedules->contains(function($schedule) use ($index,$time){
                    return $schedule->date_of_week == $index && $schedule->start_time->format('H:i:s') == $time->format('H:i:s');
                        
                });
                }
            }
        }

        
    
    }

        public function save()
        {
            
            $this->doctor->schedules()->delete();

            foreach($this->schedule as $day_of_week =>$intervals){
                foreach($intervals as $start_time => $ischecked){
                    if($ischecked) {
                        Schedule::create([
                            'doctor_id' => $this->doctor->id,
                            'date_of_week' => $day_of_week,
                            'start_time' => $start_time,
                        ]);

                    };
                }
            }

            $this->dispatch('swal',[
                'icon' => 'success',
                'title' => 'Horario Actualizado',
                'text' => 'El horario del doctor ha sido actualizado correctamente',
            ]);
        }
    
    public function render()
    {
        return view('livewire.admin.schedule-manager');
    }
}
