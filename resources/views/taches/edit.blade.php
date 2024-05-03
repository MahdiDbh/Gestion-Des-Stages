@extends('layouts.master')

@section('title')
    Gestion des taches
@endsection

@section('css')

@endsection

@section('page_title')
Créer une nouvelle tache
@endsection

@section('page_title1')
Gestion des taches
@endsection

@section('page_title2')
Créer tache
@endsection
@section('content')

<div class="" style="margin-left: 1cm;">
            <a class="btn btn-primary" href="{{ route('taches.index') }}"> Retour</a>
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
{!! Form::model($taches, ['method' => 'PATCH','route' => ['taches.update', $taches->id]]) !!}
               {{csrf_field()}}


              

    <div class="form-group">
    
                <label for="inputDescription">Intitulé</label>
                {!! Form::textarea('intitule', null, array('placeholder' => 'Groupe','class' => 'form-control' )) !!}
              </div>
     
    

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Créer</button>
    </div>    
  </div>
   </div>
{!! Form::close() !!}
     
@endsection
