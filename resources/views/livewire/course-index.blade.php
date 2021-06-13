<div>
    <div>
        <div>
            <button wire:click="resetFilters" class="zviolet">Todos</button>
            <div>
                <button>Categoria</button>
                <div>
                    @foreach ($categories as $category )
                        <a wire:click="$set('category_id',{{$category->id}})" class="zpointer">
                            {{$category->name}}
                        </a>
                        <br>
                    @endforeach
                </div>
            </div>
            <div>
                <button>Nieveles</button>
                <div>
                    @foreach ($levels as $level )
                    <a wire:click="$set('level_id',{{$level->id}})" class="zpointer">
                        {{$level->name}}
                    </a>
                    <br>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p>
        category_id : {{$category_id}}
    </p>
    <p>
        level_id : {{$level_id}}
    </p>
    <hr><br>
    <div class="px-4 grid grid-cols-4 gap-6">
        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach
    </div>
    <div>
        {{$courses->links()}}
    </div>
    
</div>
