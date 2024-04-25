@extends('layouts.master')

@section('title')
    Gestion des Evaluations
@endsection

@section('css')

@endsection

@section('page_title')
Créer une Evaluation
@endsection

@section('page_title1')
Gestion des Evaluations
@endsection

@section('page_title2')
Faire une evaluation
@endsection
@section('content')

<div class="" style="margin-left: 1cm;">
            <a class="btn btn-primary" href="{{ route('evaluation.index') }}"> Retour</a>
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
{!! Form::open(array('route' => 'evaluation.store','method'=>'POST')) !!}
    <div class="card-body">
    <div class="form-group">
                <label for="inputName">Stagiaire</label>
                <input type="text" id="inputName" class="form-control" placeholder="Enter le nome de stagiaire">
                </div>

                <label for="inputName">Note</label>
                <input type="text" id="inputName" class="form-control" placeholder="Enter la note sur 20">
                
                
              <label>Intitulé</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>

              <div class="form-group">
                    
      </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Ajouter</button>
    </div>
  </form>
</div>
@endsection
