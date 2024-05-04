@extends('layouts.master')

@section('title')
    Fichiers et Documents
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des Fichiers et Documents
@endsection

@section('page_title1')
Fichiers et Documents
@endsection

@section('page_title2')
Gestion Fichiers et Documents
@endsection

@section('content')

<div class="card-header">

    <button class=" mr-3 btn btn-primary"> <a href="{{ route('fichier.create') }}" class="" style="color:#FFF ;text-decoration:none" >Ajouter un fichier</a>
    </button>

</div>
<div class="card">
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Intetilé</th>
                <th>Le memoire</th>
                <th>Le code</th>
                <th>Action</th>
            </tr>
            </thead>
                <tbody>
                     @foreach($data as $x) 
                    <tr> 
                        <td>{{$x->intitule}} </td>
                        <td>  {{$x->path_memoire}} </td>
                        <td>  {{$x->path_code}}</td>
                        <td> 
                            @can('fichier-edit')  <a class="btn btn-primary" href="{{ route('fichier.edit',1) }}">Modifier</a> @endcan
                            @can('fichier-delete')     {!! Form::open(['method' => 'DELETE','route' => ['fichier.destroy', 1],'style'=>'display:inline']) !!}
                                     {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-fichier'] ) !!} @endcan
                                 {!! Form::close() !!}

                        </td>
                    </tr>
                      @endforeach 
                </tbody>
    </table>
</div>

</div>
@endsection

@section('scripts')

@endsection
