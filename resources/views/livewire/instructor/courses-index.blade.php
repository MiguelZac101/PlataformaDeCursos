<div>
    <div>
        <input wire:model="search" wire:keydown="limpiar_page" type="text">
    </div>
    
    @if ($courses->count())
    <table>
        <tr>
            <th>image</th>
            <th>Title</th>
            <th>category</th>
            <th>matriculados</th>
            <th>rating</th>
            <th>Status</th>
            <th>@ slot</th>
            <th></th>            
        </tr>
        @foreach ($courses as $course)
            <x-instructor-course-tr :course="$course">
                contenido de @ slot
            </x-instructor-course-tr>
        @endforeach
        <tr>
            <td colspan="8">{{$courses->links()}}</td>
        </tr>
    </table>     
    @else
        <div>
            No hay registros..        
        </div>
    @endif
</div>
