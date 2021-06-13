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
    <div class="container grid gri-cols-3">
        <div class="col-span-2">
            <section>
                <div>
                    <h1>lo q aprenderas</h1>
                    <ul>
                        @foreach ($course->goals as $goal)
                            <li>{{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <br>
            <section>
                <h1>Temario</h1>
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
                <h1>requisitos</h1>
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
                <h1>Descreipción</h1>
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
                    <!--Policies/CoursePolicy.php-->
                    @can('enrolled',$course)
                        <a href="{{route('courses.status',$course)}}">
                            Continuar con el curso
                        </a>
                    @else
                        <form action="{{route('course.enrolled',$course)}}" method="POST">
                            @csrf
                            <button>Llevar este curso</button>
                        </form>
                    @endcan
                </div>
            </section>
            <aside>
                @foreach ($similares as $similar )
                    <article>
                        <img src="{{Storage::url($similar->image->url)}}" alt="">
                        <div>
                            <h1>
                                <a href="{{route('courses.show',$similar)}}">
                                    {{Str::limit($similar->title,40)}}
                                </a>
                            </h1>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>