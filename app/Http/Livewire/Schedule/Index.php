<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use Livewire\Component;

class Index extends Component
{
    public $sunday, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday;

    protected $listeners = ['schedule_updated' => 'loadSchedule'];

    public function mount()
    {
        $this->loadSchedule();
    }

    public function loadSchedule()
    {
        $schedule = Schedule::with('course.instructor', 'subject')->get();
        $this->sunday    = $schedule->filter(function($value, $key){ return $value->day === 'su'; });
        $this->monday    = $schedule->filter(function($value, $key){ return $value->day === 'mo'; });
        $this->tuesday   = $schedule->filter(function($value, $key){ return $value->day === 'tu'; });
        $this->wednesday = $schedule->filter(function($value, $key){ return $value->day === 'we'; });
        $this->thursday  = $schedule->filter(function($value, $key){ return $value->day === 'th'; });
        $this->friday    = $schedule->filter(function($value, $key){ return $value->day === 'fr'; });
        $this->saturday  = $schedule->filter(function($value, $key){ return $value->day === 'sa'; });
    }

    public function deleteClass(Schedule $class)
    {
        $class->delete();
        $this->loadSchedule();
    }

    public function render()
    {
        return view('livewire.schedule.index');
    }
}
