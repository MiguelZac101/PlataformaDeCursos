<div>
    <div class="container grid grid-cols-3">
        <div class="col-span-2">
            {!!$current->iframe!!}
            {{$current->name}}
        </div>
        <div class="card">
            <div>
                <h1>{{$course->title}}</h1>
                <div>
                    <figure>
                        <img src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a href="{{Str::slug($course->teacher->name,'')}}"></a>
                    </div>
                </div>
                <ul>
                    @foreach ($course->sections as $section )
                        <li>
                            <a class="font-bold">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a href="">
                                            {{$lesson->name}}
                                            @if ($lesson->completed)
                                                Completado
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>                        
                    @endforeach
                </ul>

            </div>

        </div>
    </div>
</div>
