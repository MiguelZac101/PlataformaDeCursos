<div>
    <div class="card">        
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" type="text" class="form-control w-100" placeholder="Buscar...">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nommbre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{$user->id}}
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="{{route('admin.users.edit',$user)}}">Editar</a>
                                </td>                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No hay Usurios</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros...</strong>
            </div>
        @endif
    </div>
</div>
