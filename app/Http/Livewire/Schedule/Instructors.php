<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Instructor;
use App\Models\Schedule;
use App\Models\Student;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Instructors extends ModalComponent
{
    public $schedule_id, $schedule;

    public function mount($schedule_id)
    {
        $this->schedule_id = $schedule_id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->schedule = Schedule::with('course.instructor')->find($this->schedule_id);
    }

    public function addStudent(Instructor $instructor)
    {
        $this->schedule->instructors()->attach($instructor);
        $this->emit('schedule_updated');
        $this->loadData();
    }

    public function removeStudent(Instructor $instructor)
    {
        $this->schedule->instructors()->detach($instructor);
        $this->emit('schedule_updated');
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.schedule.instructors');
    }
}
