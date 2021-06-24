<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;

use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where('user_id',auth()->user()->id)
                ->where('title','LIKE','%'.$this->search.'%')
                ->latest('id')
                ->paginate(10);
        /*$courses = Course::where('title','LIKE','%'.$this->search.'%')
                ->latest('id')
                ->paginate(10);*/
        return view('livewire.instructor.courses-index',compact('courses'));
    }

    public function limpiar_page(){
        //page es una propiedad de WithPagination
        $this->reset('page');
    }
}
