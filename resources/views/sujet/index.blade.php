@extends('layouts.master')

@section('title')
    Sujet
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des sujets
@endsection

@section('page_title1')
Sujet
@endsection

@section('page_title2')
Gestion Sujet
@endsection

@section('content')

<div class="card-header">

    <button class=" mr-3 btn btn-primary"> <a href="{{ route('sujet.create') }}" class="" style="color:#FFF ;text-decoration:none" >Ajouter un Sujet</a>
    </button>

</div>
<div class="card">
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>Intitulé</th>
                <th>Discription</th>
                <th>Encadrent</th>
                <th>Valide</th>
                <th>Action</th>



            </tr>
            </thead>
                <tbody>
                   @foreach($data as $x) 
                    <tr>

                        <td> {{$x->intitule}} </td>
                        <td>{{$x->description_sujet}}</td>
                        <td>{{$x?->user()->first()->name}}</td>
                        <td>{{$x->statut()->first()->description}}</td>
                        <td>


                            @can('sujet-edit')  <a class="btn btn-primary" href="{{ route('sujet.edit',$x->id ) }}">Modifier</a> @endcan
                            @can('sujet-delete')     {!! Form::open(['method' => 'DELETE','route' => ['sujet.destroy', $x->id],'style'=>'display:inline']) !!}
                                     {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-sujet'] ) !!} @endcan
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
