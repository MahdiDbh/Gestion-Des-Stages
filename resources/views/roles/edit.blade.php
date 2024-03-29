@extends('layouts.master')

@section('title')
    Gestion de Role
@endsection

@section('css')

@endsection

@section('page_title')
Créer un role
@endsection

@section('page_title1')
Gestion de role
@endsection

@section('page_title2')
Créer un role
@endsection
@section('content')

<div class="" style="margin-left: 1cm;">
    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Retour</a>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
<strong>Whoops!</strong> Vérifier bien vos données avant de valider.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div style="margin-right:0.5cm; margin-left:0.5cm; margin-top:1cm;">
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name">Role</label>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </div>
    {!! Form::close() !!}

</div>
    @endsection
