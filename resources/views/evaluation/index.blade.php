@extends('layouts.master')

@section('title')
    Evaluation
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des stages
@endsection

@section('page_title1')
Evaluation
@endsection

@section('page_title2')
Gestion Stage
@endsection

@section('content')

<div class="card-header">

    <button class=" mr-3 btn btn-primary"> <a href="{{ route('evaluation.create') }}" class="" style="color:#FFF ;text-decoration:none" >Ajouter une evaluation</a>
    </button>

</div>
<div class="card">
<div class="card-body">
    
                  
    <div>
      <td>
            @can('evaluation-edit')  <a class="btn btn-primary" href="{{ route('evaluation.edit',1) }}">Modifier</a> @endcan
             @can('evaluation-delete')     {!! Form::open(['method' => 'DELETE','route' => ['evaluation.destroy', 1],'style'=>'display:inline']) !!}
             {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-evaluation'] ) !!} @endcan
             {!! Form::close() !!}

              </td>
   </div>


</div>
@endsection

@section('scripts')

@endsection
