@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit users</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Nombre</h1>
            <p>{{$user->name}}</p>
            <h1>Lista de roles</h1>
            {!! Form::model($user,['route'=>['admin.users.update',$user],'method'=>'put']) !!}
                
                @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null) !!}
                        {{$role->name}}
                    </label>
                </div>
                @endforeach

                {!! Form::submit('Asignar ROl', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop