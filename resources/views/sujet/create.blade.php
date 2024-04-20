@extends('layouts.master')

@section('title')
    Gestion d'utilisateurs
@endsection

@section('css')

@endsection

@section('page_title')
Gestion d'utilisateurs
@endsection

@section('page_title1')
    Accueil
@endsection

@section('page_title2')
Gestion d'utilisateurs
@endsection
@section('content')

<div class="" style="margin-left: 1cm; margin-bottom:1cm">
        <a class="btn btn-success" href="{{ route('sujet.index') }}"> Retour</a>
</div>


<div style="margin-top:-0.5cm;">
{!! Form::open(array('route' => 'taches.store','method'=>'POST')) !!}
</div>
<section class="content">
      <div class=">
        <div class="col-md-6">
                        
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Intitulé</label>
                <input type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Statut</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Sélectionnez-en un</option>
                  <option>Valide</option>
                  <option>En attente</option>
                  <option>Invalide</option>
                </select>
              </div>
              
              <div class="form-group">
                <label for="inputProjectLeader">Encadrent</label>
                <input type="text" id="inputProjectLeader" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          <!-- /.card -->
       
        <div class="card-footer">
      <button type="submit" class="btn btn-primary" style="margin-top: -0.5cm">Créer</button>
    </div>
    </div>
    </form>
  </div>
@endsection
@section('scripts')
<script>
    $('.sujet-delete').click(function(e){
        e.preventDefault() // comfirmer avant supprimer
        if (confirm('voulez vous vraiment supprimer cet sujet de façon permanente ?')) {
            // Post the form
            $(e.target).closest('form').submit()
        }
    });
</script>
@endsection
