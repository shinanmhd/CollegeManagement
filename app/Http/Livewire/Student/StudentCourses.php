<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class StudentCourses extends Component
{
    public $student;

    protected $listeners = ['student_course_assigned' => 'reload'];

    public function mount(Student $student) {
        $this->student = $student;
    }

    public function reload(Student $student)
    {
        if ($this->student->id == $student->id)
        {
            $this->student = $student;
        }
    }

    public function render()
    {
        return view('livewire.student.student-courses');
    }
}
