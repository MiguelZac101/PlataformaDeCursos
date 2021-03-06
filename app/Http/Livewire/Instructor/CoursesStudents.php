<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;

use App\Models\Course;

use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use WithPagination;

    public $course,$search;

    public function mount(Course $course){
        $this->course = $course;
    }

    //cada vez q se actualice $search 
    //reseteara la variable page ->/?page=2
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $students = $this->course->students()->where('name','LIKE','%'.$this->search.'%')->paginate(4);
        return view('livewire.instructor.courses-students',compact('students'))->layout('layouts.instructor',['course'=>$this->course]);
    }
}
