<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use App\Models\Student;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Students extends ModalComponent
{
    public $schedule_id, $schedule;

    public function mount($schedule_id)
    {
        $this->schedule_id = $schedule_id;
        $this->loadData();
    }

    public function loadData()
    {
        $this->schedule = Schedule::with('course.students', 'course.instructor')->find($this->schedule_id);
    }

    public function addStudent(Student $student)
    {
        $this->schedule->students()->attach($student);
        $this->emit('schedule_updated');
        $this->loadData();
    }

    public function removeStudent(Student $student)
    {
        $this->schedule->students()->detach($student);
        $this->emit('schedule_updated');
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.schedule.students');
    }
}
