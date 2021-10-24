<?php

namespace App\Http\Livewire\Instructor;

use App\Models\course;
use App\Models\Instructor;
use LivewireUI\Modal\ModalComponent;

class AssignCourse extends ModalComponent
{
    public $instructor, $courses;

    public function mount(Instructor $instructor)
    {
        $this->instructor = $instructor;
        $this->reloadData();
    }

    public function reloadData()
    {
        $this->instructor = Instructor::find($this->instructor->id);
        $this->courses = course::all();
    }

    public function assign(course $course)
    {
        $this->instructor->courses()->attach($course);
        $this->reloadData();
        $this->emit('instructor_course_assigned', ['instructor' => $this->instructor]);
    }

    public function removeCourse(course $course)
    {
        $this->instructor->courses()->detach($course);
        $this->instructor->schedules()->detach();
        $this->reloadData();
        $this->emit('instructor_course_assigned', ['instructor' => $this->instructor]);
    }
    public function render()
    {
        return view('livewire.instructor.assign-course');
    }
}
