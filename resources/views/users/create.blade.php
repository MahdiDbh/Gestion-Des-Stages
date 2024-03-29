@extends('layouts.master')

@section('title')
    Gestion d'utilisateurs
@endsection

@section('css')

@endsection

@section('page_title')
Créer un nouveau utilisateur
@endsection

@section('page_title1')
Gestion d'utilisateurs
@endsection

@section('page_title2')
Créer utilisateur
@endsection
@section('content')

<div class="" style="margin-left: 1cm;">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
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
<div style="margin-top:-0.5cm;">
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="card-body">
      <div class="form-group">
        <label for="name">Nom d'Utilisateur</label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
       </div>
       <div class="form-group">
        <label for="email">Address Email</label>
        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
      </div>
      <div class="form-group">
        <label for="password">Mot de pass</label>
        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
      </div>
        <div class="form-group">
            <label for="confirm-password">Comfirmer votre mot de pass</label>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>


        <div class="form-group">
            <strong>Role</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Créer</button>
    </div>
  </form>
</div>
@endsection
