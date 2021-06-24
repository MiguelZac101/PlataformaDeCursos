<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!--incluyendo fontqwesome -->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edicion de curso</h1>
                    <ul>
                        <li class="leading-7 mb-1 border-1-4 @routeIs('instructor.courses.edit',$course) text-red-700 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit',$course)}}">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-1-4 @routeIs('instructor.courses.curriculum',$course) text-red-700 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum',$course)}}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-1-4 @routeIs('instructor.courses.goals',$course) text-red-700 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals',$course)}}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-1-4 @routeIs('instructor.courses.students',$course) text-red-700 @endif pl-2">
                            <a href="{{route('instructor.courses.students',$course)}}">Estudiantes</a>
                        </li>
                    </ul>

                    @switch($course->status)
                        @case(1)
                            <form action="{{route('instructor.courses.status',$course)}}" method="POST" class="ml-2">
                                @csrf
                                <button type="submit" class="bg-red-300 p-2">
                                    Solicitar Revisión
                                </button>
                            </form>
                            @break
                        @case(2)
                            <p class="ml-2 bg-yellow-300 p-2">Curso en revisión</p>                            
                            @break
                        @case(3)
                            <p class="ml-2 bg-blue-400 p-2">Curso Públicado</p>                            
                            @break                            
                    @endswitch
                    

                </aside>
                <div class="col-span-4 card">
                    <main class="card-body text-gray-600">
                        {{$slot}}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        <!-- pinta el contenido dentro de <x-slot name="js">, 
            views/instructor/courses/edit.blade.php -->
        @isset($js)
            {{$js}}
        @endisset

    </body>
</html>
