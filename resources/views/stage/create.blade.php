@extends('layouts.master')

@section('title')
    Gestion de stage
@endsection

@section('css')

@endsection

@section('page_title')
Créer un stage
@endsection

@section('page_title1')
Gestion de stage
@endsection

@section('page_title2')
Créer un stage
@endsection
@section('content')
<div class="" style="margin-left: 1cm;">
    <a class="btn btn-primary" href="{{ route('stage.index') }}"> Retour</a>
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
{!! Form::open(array('route' => 'stage.store','method'=>'POST')) !!}
<div class="card-body">
    <div class="form-group">
      <label for="name">stage</label>
      {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
     </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Créer</button>
    </div>
</div>
{!! Form::close() !!}

@endsection

