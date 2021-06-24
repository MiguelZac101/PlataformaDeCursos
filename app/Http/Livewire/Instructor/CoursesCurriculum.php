<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;

use App\Models\Section;

//libreria necesaria para usar los policies
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    //uso libreria necesaria para usar los policies
    use AuthorizesRequests;

    public $course,$section,$name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->section = new Section();

        //verifica que el usuario q accede sea el autor, es un policie
        //función 'dicatated' de app/Policies/CoursePolicy
        $this->authorize('dicatated',$course);
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
    }

    public function store(){

        $this->validate([
            'name' => 'required'
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }

    public function edit(Section $section){
        $this->section = $section;
    }

    public function update(){
        $this->validate();

        $this->section->save();
        $this->section = new Section();
        //volver a cargar para q se actualice ls cambios
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Section $section){
        $section->delete();
        $this->course = Course::find($this->course->id);
    }
}
