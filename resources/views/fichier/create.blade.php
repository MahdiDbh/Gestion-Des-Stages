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
{!! Form::open(array('route' => 'fichier.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
    <div class="card-body">

    <div class="form-group">
        <label for="intitulé">Intitulé</label>
        <select name="sujet" id="st" class="form-control">
              @foreach($sujet as $sj)
              <option value="{{ $sj->id }}" required> {{$sj->intitule}} </option>
              @endforeach
            </select>

              <div class="form-group">
                    <label for="exampleInputFile">Entrée le Fichier de Memoire</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name ="path_memoire" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choisir un Memoire Format PDF</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
     

                  <div class="form-group">
                    <label for="exampleInputFile">Entrée le code</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name ="path_code" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choisir un fichier format zip</label>
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
