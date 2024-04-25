@extends('layouts.master')

@section('title')
    Sujet
@endsection

@section('css')

@endsection

@section('page_title')
Modifier un sujet
@endsection

@section('page_title1')
Modifier
@endsection

@section('page_title2')
sujet
@endsection

@section('content')

<div class="col-md-12">
    <div class="card-body" style="padding: 3.25rem;">

               {!! Form::model($sujet, ['method' => 'PATCH','route' => ['sujet.update', $sujet->id]]) !!}
               {{csrf_field()}}


            {!! Form::text('id', null, array('class' => 'form-control ', 'hidden')) !!}

            <div class="position-relative row form-group">
                       <label for="nom" class="col-sm-2 col-form-label">Intitulé</label>
                       <div class="col-sm-10">
                           {!! Form::text('intitule', null, array('placeholder' => 'Groupe','class' => 'form-control' )) !!}
                       </div>
               </div>



           <div class="position-relative row form-group">
                       <label for="nom" class="col-sm-2 col-form-label">Description</label>
                       <div class="col-sm-10">
                           {!! Form::textarea('description_sujet', null, array('placeholder' => 'description du sujet','class' => 'form-control')) !!}
                       </div>
                </div>


                <div class="form-group">
                    <strong>Encadrant</strong>
                    <select name="encadrant" id="enc" class="form-control">
                    @foreach($encadrant as $en)
                    <option value='{{ $en->id }}'> {{$en->name}} </option>
                    @endforeach
                    </select>
      
                </div>
               <div class="position-relative row form-check">
                       <div class="col-sm-10 offset-sm-2">
                           <button class="mt-1 btn btn-primary" type="submit">Modifier</button>
                       </div>
                   </div>
           {!! Form::close() !!}
   </div>
</div>

@endsection

@section('scripts')

@endsection
