<div>
    <article class="card my-2" x-data="{open:false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open=!open" class="cursor-pointer">Descripción de la Lección</h1>
            </header>
            <div x-show="open">
                <hr >

                @if($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input w-full mb-2" placeholder="actualizar"></textarea>
                        @error('description.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-center">
                            <button wire:click="destroy" class="text-sm bg-red-200 border-2 px-2" type="button">Eliminar</button>
                            <button class="text-sm bg-blue-200 border-2 px-2 ml-2" type="submit">Actualizar</button>
                        </div>
                    </form>
                @else
                    <div>
                        <textarea wire:model="name" class="form-input w-full mb-2" placeholder="agregar descripción"></textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-center">                            
                            <button wire:click="store" class="text-sm bg-blue-200 border-2 px-2 ml-2" >Registrar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
