<x-instructor-layout :course="$course">   
    
    <h1 class="text-2x1 font-bold">INFORMACIÓN DEL CURSO</h1>
    <hr>
    {!! Form::model($course, ['route'=>['instructor.courses.update',$course],'method'=>'put','files'=>true]) !!}

        @include('instructor.courses.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Actualizar información', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}


    <!--slot con nombre,renderiza contenido en views/layouts/app.blade.php-->
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/form.js')}}"></script>
    </x-slot>
    
</x-instructor-layout>