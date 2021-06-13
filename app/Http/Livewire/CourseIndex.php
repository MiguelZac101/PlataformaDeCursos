<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

use App\Models\Category;
use App\Models\Level;

//paginación dinamica
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;

    //estas variable se pueden acceder desde su vista
    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::where('status',3)
        ->category($this->category_id)
        ->level($this->level_id)
        ->latest('id')
        ->paginate(8);
        return view('livewire.course-index',compact('courses','categories','levels'));
    }

    public function resetFilters(){
        $this->reset(['category_id','level_id']);
    }
}
