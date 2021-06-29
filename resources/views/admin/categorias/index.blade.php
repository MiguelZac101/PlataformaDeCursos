@extends('adminlte::page')

@section('title', 'Lista de Roles')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')
    @if (session('mensaje'))
        <div>
            <strong>{{session('mensaje')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.categorias.create')}}">Crear Categoria</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $categoria)
                        <tr>
                            <td>
                                {{$categoria->id}}
                            </td>
                            <td>
                                {{$categoria->name}}
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('admin.categorias.edit',$categoria)}}">Editar</a>
                            </td>
                            <td>
                                <form action="{{route('admin.categorias.destroy',$categoria)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay rol registrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop