<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-4 border-2 p-4" x-data="{open:false}">
            <div class="card-body">

                @if ($item->id == $lesson->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="lesson.name" class="form-input w-full">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="lesson.platform_id">
                                @foreach($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach 
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">URL:</label>
                            <input wire:model="lesson.url" class="form-input w-full">
                        </div>
                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button wire:click="cancel" type="button" class="border-2 px-2 bg-red-200" >Cancelar</button>
                            <button type="submit" class="border-2 px-2 ml-2 bg-blue-200" >Actualizar</button>
                        </div>
                    </form>
                @else
                    <header x-on:click="open=!open" class="cursor-pointer">
                        <h1><i class="far fa-play-circle text-blue-500 mr-i"></i>Lección: {{$item->name}}</h1>
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                        <div class="mt-2">
                            <button wire:click="edit({{$item}})" class="border-2 px-2 text-sm bg-blue-200">Editar</button>
                            <button wire:click="destroy({{$item}})" class="border-2 px-2 text-sm bg-red-200">Eliminar</button>
                        </div>

                        <div>
                            @livewire('instructor.lesson-description', ['lesson' => $item], key("lesson-description-".$item->id))
                        </div>

                        <div>
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key("lesson-resources-".$item->id))
                        </div>

                    </div>
                @endif
            </div>            
        </article>
    @endforeach

    <div x-data="{open:false}" class="mt-4">
        <a x-show="!open" x-on:click="open=true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2x1 text-red-500 mr-2"></i>
            Agregar Nueva Lección
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-x1 font-bold mb-4">Agregar Nueva Lección</h1>
                
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="name" class="form-input w-full">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select wire:model="platform_id">
                            @foreach($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach 
                        </select>
                    </div>

                    <div class="flex items-center mt-4">
                        <label class="w-32">URL:</label>
                        <input wire:model="url" class="form-input w-full">
                    </div>
                    @error('url')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open=false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store" >Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
