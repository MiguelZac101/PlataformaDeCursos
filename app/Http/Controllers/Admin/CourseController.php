<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;

use Illuminate\Support\Facades\Mail;
use App\Mail\AprobarCurso;

class CourseController extends Controller{

    public function index(){
        $courses = Course::where('status',2)->paginate(4);
        return view('admin.courses.index',compact('courses'));
    }

    public function show(Course $course){
        //policie, revisa q el estado del curso sea 2 pendiente de revisión
        $this->authorize('revision',$course);

        return view('admin.courses.show',compact('course'));
    }

    public function publicar(Course $course){
        //policie, revisa q el estado del curso sea 2 pendiente de revisión
        $this->authorize('revision',$course);

        //validación
        if(!$course->goals){
            return back()->with('mensaje','falto alguna valicación');
        }

        $course->status = 3;//publicado
        $course->save();

        //enviar correo 
        $mail = new AprobarCurso($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('mensaje','curso publicado!');
    }
}
