<x-app-layout>
    <section>
        <div class="grid grid-cols-2 gap-6">
            <figure>
                <img src="{{Storage::url($course->image->url)}}" alt="">
            </figure>
            <div>
                <h1>titulo: {{$course->title}}</h1>
                <h2>Subtitulo: {{$course->subtitle}}</h2>
                <p>Nivel: {{$course->level->name}}</p>
                <p>Categoria: {{$course->category->name}}</p>
                <p>Matriculados: {{$course->students_count}}</p>
                <p>Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>
    <div class="container grid grid-cols-3">
        @if (session('mensaje'))
        <div class="col-span-3">
            <div class="text-red-500 border-red-600 p-4 m-4">
                Error: {{session('mensaje')}}
            </div>
        </div>   
        @endif
        
        <div class="col-span-2">
            <section>
                <div>
                    <h1 class="text-3xl">lo q aprenderas</h1>
                    <ul>
                        @foreach ($course->goals as $goal)
                            <li>{{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <br>
            <section>
                <h1 class="text-3xl">Temario</h1>
                @foreach ($course->sections as $section )
                    <article>
                        @if($loop->first) 
                            <p>primera iteración</p>
                        @else
                            <p>otro caso</p>
                        @endif

                        <h1>{{$section->name}}</h1>
                        <div>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        {{$lesson->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <hr>
                    </article>
                @endforeach
            </section>
            <br>
            <section>
                <h1 class="text-3xl">requisitos</h1>
                <ul>
                    @foreach ($course->requirements as $requirement)
                        <li>
                            {{$requirement->name}}
                        </li>
                    @endforeach
                </ul>
            </section>
            <br>
            <section>
                <h1 class="text-3xl">Descreipción</h1>
                <div>
                    {{$course->description}}
                </div>
            </section>
        </div>
        <div>
            <section>
                <div>
                    <div>
                        <img src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div>
                            <h1>{{$course->teacher->name}}</h1>
                            <a href="">
                                {{'@'.Str::slug($course->teacher->name,'')}}
                            </a>
                        </div>
                    </div>
                    
                    <form action="{{route('admin.courses.publicar',$course)}}" method="POST">
                        @csrf
                        <button class="bg-blue-400 p-4 w-full">Publicar Curso</button>
                    </form>
                    <a href="{{route('admin.courses.observado',$course)}}" class="bg-red-400 p-4 w-full block mt-4 text-center cursor-pointer">
                        Observar Curso
                    </a>
                </div>
            </section> 

        </div>
    </div>
</x-app-layout>