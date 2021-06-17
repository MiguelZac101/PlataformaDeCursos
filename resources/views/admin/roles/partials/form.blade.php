<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name')?' is-invalid':'')]) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>
<Strong>Permisos</Strong>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null) !!}
            {{$permission->name}}
        </label>
    </div>
@endforeach
@error('permissions')
    <small class="text-danger">
        <strong>
            {{$message}}
        </strong>
    </small>                    
@enderror