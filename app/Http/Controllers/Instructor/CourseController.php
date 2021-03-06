<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Level;
use App\Models\Price;

use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('can:Leer Cursos')->only('index');
        $this->middleware('can:Crear Cursos')->only('create','store');
        $this->middleware('can:Actualizar Cursos')->only('edit','update','goals');
        $this->middleware('can:Eliminar Cursos')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        $levels = Level::pluck('name','id');
        $prices = Price::pluck('name','id');

        return view('instructor.courses.create',compact('categories','levels','prices'));               
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id'=>auth()->user()->id]);

        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ]);

        $course = Course::create($request->all());

        if($request->file('file')){
            $url = Storage::put('cursos',$request->file('file'));
            $course->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('instructor.courses.edit',$course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //llamando a funci??n 'dicatated' de app/Policies/CoursePolicy
        //para restringir la edici??n de curso por otro instructor que no sea el autor
        $this->authorize('dicatated',$course);

        $categories = Category::pluck('name','id');
        $levels = Level::pluck('name','id');
        $prices = Price::pluck('name','id');

        return view('instructor.courses.edit',compact('course','categories','levels','prices'));       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        
        $this->authorize('dicatated',$course);

        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:courses,slug,'.$course->id,//valida q sea unico y q no lo compare consigomismo
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ]);

        $course->update($request->all());

        if($request->file('file')){
            $url = Storage::put('cursos',$request->file('file'));
            
            if($course->image){
                Storage::delete($course->image->url);
                $course->image->update([
                    'url' => $url
                ]);
            }else{
                $course->image()->create([
                    'url' => $url
                ]);
            }

        }

        return redirect()->route('instructor.courses.edit',$course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function goals(Course $course){
        return view('instructor.courses.goals',compact('course'));
    }

    public function status(Course $course){
        $course->status = 2;
        $course->save();

        //eliminar observaciones si tiene
        if($course->observation){
            $course->observation->delete();
        }

        return redirect()->route('instructor.courses.edit',$course);
    }

    public function observacion(Course $course){
        return view('instructor.courses.observacion',compact('course'));
    }

}
