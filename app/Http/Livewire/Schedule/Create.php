<?php

namespace App\Http\Livewire\Schedule;

use App\Models\course;
use App\Models\Schedule;
use App\Models\subject;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $courses, $subjects, $schedule;

    protected $rules = [
        'schedule.course_id'  => 'required',
        'schedule.subject_id' => 'required',
        'schedule.day'        => 'required',
        'schedule.time_start' => 'required',
        'schedule.time_end'   => 'required',
    ];

    public function mount()
    {
        $this->courses = course::with('subjects')->get();
        $this->subjects = null;

        $this->schedule = new Schedule();
    }

    public function courseSelected()
    {
        $this->subjects = subject::where('course_id', $this->schedule->course_id)->get();
    }

    public function submit()
    {
        $this->validate();
        $this->schedule->save();
        $this->emit('schedule_updated');
        $this->closeModalWithEvents(['schedule_updated']);
    }

    public function render()
    {
        return view('livewire.schedule.create');
    }
}
