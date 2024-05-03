@extends('layouts.master')

@section('title')
    Gestion des stages
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
        <select name="intitule" id="st" class="form-control">
              @foreach($sujet as $sj)
              <option value="{{ $sj->id }}" required> {{$sj->intitule}} </option>
              @endforeach
            </select>
       </div>

       

        <div class="form-group">
            <strong>Encadrant</strong>
            <select name="encadrant" id="enc" class="form-control">
              @foreach($encadrant as $en)
              <option value='{{ $en->id }}'> {{$en->name}} </option>
              @endforeach
            </select>
      
        </div>

        <div class="form-group">
            <strong>Stagiaire</strong>
            <select name="stagiaire1" id="st" class="form-control">
              @foreach($stagiaire as $st)
              <option value='{{ $st->id }}'> {{$st->name}} </option>
              @endforeach
            </select>
        </div>

        <div class="form-group">
            <strong>Stagiaire 2</strong>
            <select name="stagiaire2" id="st" class="form-control">
            <option value=''> Aucun</option>
              @foreach($stagiaire as $st)
              <option value='{{ $st->id }}'> {{$st->name}} </option>
              @endforeach
            </select>
        </div>

        
             
        </div>
         
      </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Créer</button>
    </div>
  </form>
</div>
@endsection
