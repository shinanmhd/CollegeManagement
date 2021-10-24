<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Instructor;
use Livewire\Component;

class InstructorCourses extends Component
{
    public $instructor;

    protected $listeners = ['instructor_course_assigned' => 'reload'];

    public function mount(Instructor $instructor) {
        $this->instructor = $instructor;
    }

    public function reload(Instructor $instructor)
    {
        if ($this->instructor->id == $instructor->id)
        {
            $this->instructor = $instructor;
        }
    }

    public function render()
    {
        return view('livewire.instructor.instructor-courses');
    }
}
