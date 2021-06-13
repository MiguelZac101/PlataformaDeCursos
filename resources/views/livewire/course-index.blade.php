<div>
    <div>
        <div>
            <button>Todos</button>
            <div>
                <button>Categoria</button>
                <div>
                    <a href="">categoria1</a>
                    <a href="">categoria2</a>
                </div>
            </div>
            <div>
                <button>Nieveles</button>
                <div>
                    <a href="">categoria1</a>
                    <a href="">categoria2</a>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 grid grid-cols-4 gap-6">
        @foreach ($courses as $course)
            <article>
                <img src="{{Storage::url($course->image->url)}}" alt="">
                <div>
                    <h1>{{Str::limit($course->title,40)}}</h1>
                    <p>Teacher : {{$course->teacher->name}}</p>
                    <p>Rating : {{$course->rating}}</p>
                    <p>Students : {{$course->students_count}}</p>
                    <a href="{{route('courses.show',$course)}}">
                        Más información
                    </a>
                </div>
            </article>
        @endforeach
    </div>
    <div>
        {{$courses->links()}}
    </div>
    
</div>
