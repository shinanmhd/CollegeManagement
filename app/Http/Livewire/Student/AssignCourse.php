<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Student;
use App\Models\course;

class AssignCourse extends ModalComponent
{
    public $student, $courses;

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->reloadData();
    }

    public function reloadData()
    {
        $this->student = Student::find($this->student->id);
        $this->courses = course::all();
    }

    public function assign(course $course)
    {
        $this->student->courses()->attach($course);
        $this->reloadData();
        $this->emit('student_course_assigned', ['student' => $this->student]);
    }

    public function removeCourse(course $course)
    {
        $this->student->courses()->detach($course);
        $this->student->schedules()->detach();
        $this->reloadData();
        $this->emit('student_course_assigned', ['student' => $this->student]);
    }

    public function render()
    {
        return view('livewire.student.assign-course');
    }
}
