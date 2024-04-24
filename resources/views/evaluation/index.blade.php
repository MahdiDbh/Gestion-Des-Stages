@extends('layouts.master')

@section('title')
    Evaluation
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des Evaluation
@endsection

@section('page_title1')
Evaluation
@endsection

@section('page_title2')
Gestion Evaluation
@endsection

@section('content')

<div class="card-header">

    <button class=" mr-3 btn btn-primary"> <a href="{{ route('evaluation.create') }}" class="" style="color:#FFF ;text-decoration:none" >Ajouter une evaluation</a>
    </button>

</div>
<div class="card">
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Stagiaire</th>
                <th>Note</th>
                <th>remarque</th>
                <th>Action</th>
            </tr>
            </thead>
                <tbody>
                    {{-- @foreach($evaluation as $x) --}}
                    <tr> 
                        <td> </td>
                        <td>   </td>
                        <td>   </td>
                        <td> 
                            @can('evaluation-edit')  <a class="btn btn-primary" href="{{ route('evaluation.edit',1) }}">Modifier</a> @endcan
                            @can('evaluation-delete')     {!! Form::open(['method' => 'DELETE','route' => ['evaluation.destroy', 1],'style'=>'display:inline']) !!}
                                     {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-evaluation'] ) !!} @endcan
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
