@extends('layouts.master')

@section('title')
    Gestion d'utilisateurs
@endsection

@section('css')

@endsection

@section('page_title')
Modifier un utilisateur
@endsection

@section('page_title1')
Gestion d'utilisateurs
@endsection

@section('page_title2')
Modifier un utilisateur
@endsection

@section('content')


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Vérifier vos données avant de valider.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div style="margin-top:-0.5cm;">

    {!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}
        <div class="card-body">
        <div class="form-group">
          <label for="name">Nom</label>
              {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
         </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Modifier</button>
      </div>
      {!! Form::close() !!}
</div>

@endsection
