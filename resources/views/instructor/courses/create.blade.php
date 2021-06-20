<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <h1 class="text-2x1 font-bold">NUEVO CURSO</h1>
            <hr>
            {!! Form::open(['route'=>'instructor.courses.store','files'=>true]) !!}

                @include('instructor.courses.partials.form')
                
                <div class="flex justify-end">
                    {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>        
    </div>
    <!--slot con nombre,renderiza contenido en views/layouts/app.blade.php-->
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/form.js')}}"></script>
    </x-slot>
</x-app-layout>