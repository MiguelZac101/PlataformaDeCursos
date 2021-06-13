@props(['course'])
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