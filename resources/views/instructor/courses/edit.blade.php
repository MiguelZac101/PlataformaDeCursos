<x-app-layout>
    <div class="container py-8 grid grid-cols-5">
        <aside>
            <h1 class="font-bold text-lg mb-4">Edicion de curso</h1>
            <ul>
                <li class="leading-7 mb-1 border-1-4">
                    <a href="">Información del curso</a>
                </li>
                <li class="leading-7 mb-1 border-1-4">
                    <a href="">Lecciones del curso</a>
                </li>
                <li class="leading-7 mb-1 border-1-4">
                    <a href="">Metas del curso</a>
                </li>
                <li class="leading-7 mb-1 border-1-4">
                    <a href="">Estudiantes</a>
                </li>
            </ul>
        </aside>
        <div class="col-span-4 card">
            <div class="card-body text-gray-600">
                <h1 class="text-2x1 font-bold">INFORMACIÓN DEL CURSO</h1>
                <hr>
                {!! Form::model($course, ['route'=>['instructor.courses.update',$course],'method'=>'put','files'=>true]) !!}

                    @include('instructor.courses.partials.form')

                    <div class="flex justify-end">
                        {!! Form::submit('Actualizar información', ['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!--slot con nombre,renderiza contenido en views/layouts/app.blade.php-->
    <x-slot name="js">

        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/form.js')}}"></script>
    </x-slot>
</x-app-layout>