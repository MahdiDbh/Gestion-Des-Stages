@extends('layouts.master')

@section('title')
    Stage
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des stages
@endsection

@section('page_title1')
Stage
@endsection

@section('page_title2')
Gestion Stage
@endsection

@section('content')

<div class="card-header">

    <button class=" mr-3 btn btn-primary"> <a href="{{ route('stage.create') }}" class="" style="color:#FFF ;text-decoration:none" >Ajouter un stage</a>
    </button>

</div>
<div class="card">
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>Intitulé</th>
                <th>Encadrant</th>
                <th>Statut</th>
                <th>Action</th>



            </tr>
            </thead>
                <tbody>
                     @foreach($data as $x) 
                    <tr>

                        <td>{{$x->sujet()->first()->intitule}}</td>
                        <td>{{$x?->user()->first()->name}}</td>
                        
                        <td>{{$x->statut()->first()->description}}</td>
                        <td>


                            @can('stage-edit')  <a class="btn btn-primary" href="{{ route('stage.edit',1) }}">Modifier</a> @endcan
                            @can('stage-delete')     {!! Form::open(['method' => 'DELETE','route' => ['stage.destroy', $x->id],'style'=>'display:inline']) !!}
                                     {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-stage'] ) !!} @endcan
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
