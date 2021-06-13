<form autocomplete="off">
    <input type="text" wire:model="search">
    <button>Buscar</button>
    @if($search)
    <ul>
        @forelse ($this->results as $result)
            <li>
                <a href="{{route('courses.show',$result)}}">
                    {{$result->title}}
                </a>
            </li>
        @empty
            <li>
                No hay coincidencia
            </li>
        @endforelse       
    </ul>    
    @endif    
</form>
