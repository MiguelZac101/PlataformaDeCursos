<div>
    <div class="container grid grid-cols-3">
        <div class="col-span-2">
            {!!$current->iframe!!}
            {{$current->name}}
            @if ($current->description)
                <div>{{$current->description->name}}</div>
            @endif
            <p>index: {{$this->index}} 
                previus: 
                @if ($this->previus)
                    {{$this->previus->id}}    
                @endif                
                next: 
                @if ($this->next)
                    {{$this->next->id}}
                @endif                
            </p>

            <a wire:click="completed">
                Completado (
                    @if($current->completed)
                        on
                    @else
                        off
                    @endif
                )
            </a>

            <div>
                <div>
                    @if ($this->previus)
                        <a wire:click="changeLesson({{$this->previus}})">Tema anterior</a>                        
                    @endif 
                    -
                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})">Tema siguiente</a>                        
                    @endif 
                </div>
            </div>
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
                        <p>avance : {{$this->advance}}%</p>
                    </div>
                </div>
                <ul>
                    @foreach ($course->sections as $section )
                        <li>
                            <a class="font-bold">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a wire:click="changeLesson({{$lesson}})">
                                            {{$lesson->id}}-{{$lesson->name}}
                                            @if ($lesson->completed)
                                                (Completado)
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
