@extends('layouts.master')

@section('title')
    Gestion des Fichiers et Documents
@endsection

@section('css')

@endsection

@section('page_title')
Créer un nouveau Fichier
@endsection

@section('page_title1')
Gestion des Fichiers
@endsection

@section('page_title2')
Créer un Fichier
@endsection
@section('content')

<div class="" style="margin-left: 1cm;">
            <a class="btn btn-primary" href="{{ route('fichier.index') }}"> Retour</a>
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
{!! Form::open(array('route' => 'taches.store','method'=>'POST')) !!}
    <div class="card-body">
    <div class="form-group">
                <label for="inputName">Titre</label>
                <input type="text" id="inputName" class="form-control" placeholder="Enter le titre">
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Entrée de fichier</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
     
      </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Ajouter</button>
    </div>
  </form>
</div>
@endsection
