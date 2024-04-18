@extends('layouts.master')

@section('title')
    Gestion des srages
@endsection

@section('css')

@endsection

@section('page_title')
Créer un nouveau stage
@endsection

@section('page_title1')
Gestion des stages
@endsection

@section('page_title2')
Créer stage
@endsection
@section('content')

<div class="" style="margin-left: 1cm;">
            <a class="btn btn-primary" href="{{ route('stage.index') }}"> Retour</a>
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
{!! Form::open(array('route' => 'stage.store','method'=>'POST')) !!}
    <div class="card-body">
        
      <div class="form-group">
        <label for="intitulé">Intitulé</label>
            {!! Form::text('Intitulé', null, array('placeholder' => 'Intitulé','class' => 'form-control')) !!}
       </div>

       <div class="form-group">
        <label for="Encadrant">Encadrant</label>
            {!! Form::text('Encadrant', null, array('placeholder' => 'Encadrant','class' => 'form-control')) !!}
       </div>

       <div class="form-group">
        <label for="Stagiaire">Stagiaire</label>
            {!! Form::text('Stagiaire', null, array('placeholder' => 'Stagiaire','class' => 'form-control')) !!}
       </div>

       <div class="form-group">
            <strong>Statut</strong>
            <div class="form-group">
            <strong>Role</strong>   
        </div>

        <div class="form-group">
            <strong>Encadrant</strong>
            {!! Form::select('encadrant[]', $encadrant
              ,[], array('class' => 'form-control','multiple')) !!}
      
        </div>

        <div class="form-group">
            <strong>Stagiaire</strong>
            {!! Form::select('stagiaire[]', $stagiaire
              ,[], array('class' => 'form-control','multiple')) !!}
      
        </div>
        
        <div class="form-group">
            <strong>Role</strong>
            {!! Form::select('roles[]', $roles
              ,[], array('class' => 'form-control','multiple')) !!}
      
        </div>
         
      </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Créer</button>
    </div>
  </form>
</div>
@endsection
