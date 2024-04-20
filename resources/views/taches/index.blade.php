@extends('layouts.master')

@section('title')
    Taches
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des Taches
@endsection

@section('page_title1')
Taches
@endsection

@section('page_title2')
Gestion Taches
@endsection

@section('content')

<div class="card-header">

    <button class=" mr-3 btn btn-primary"> <a href="{{ route('taches.create') }}" class="" style="color:#FFF ;text-decoration:none" >Ajouter une tache</a>
    </button>

</div>
<div class="card">
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>Intitulé</th>
                
               
                <th>Statut</th>
                <th>Action</th>



            </tr>
            </thead>
                <tbody>
                    {{-- @foreach($taches as $x) --}}
                    <tr>

                        
                        
                        <td> </td>
                        <td>   </td>
                        <td>

                            @can('taches-edit')  <a class="btn btn-secondary" href="{{ route('taches.edit',1) }}">Valider</a> @endcan
                            @can('taches-edit')  <a class="btn btn-primary" href="{{ route('taches.edit',1) }}">Modifier</a> @endcan
                            @can('taches-delete')     {!! Form::open(['method' => 'DELETE','route' => ['taches.destroy', 1],'style'=>'display:inline']) !!}
                                     {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-taches'] ) !!} @endcan
                                 {!! Form::close() !!}

                        </td>

                    </tr>
                     {{-- @endforeach --}}
                </tbody>
    </table>
</div>

</div>
@endsection

@section('scripts')

@endsection
