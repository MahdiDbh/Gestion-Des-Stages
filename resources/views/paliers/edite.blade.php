@extends('layouts.master')

@section('title')
    Palier
@endsection

@section('css')

@endsection

@section('page_title')
Modifier un palier
@endsection

@section('page_title1')
Modifier
@endsection

@section('page_title2')
Palier
@endsection

@section('content')

<div class="col-md-12">
    <div class="card-body" style="padding: 3.25rem;">

               {!! Form::model($palier, ['method' => 'PATCH','route' => ['paliers.update', $palier->id]]) !!}
               {{csrf_field()}}


            {!! Form::text('id', null, array('class' => 'form-control ', 'hidden')) !!}

            <div class="position-relative row form-group">
                       <label for="nom" class="col-sm-2 col-form-label">SMSC</label>
                       <div class="col-sm-10">
                           {!! Form::text('SMSC', null, array('placeholder' => 'Groupe','class' => 'form-control' , 'disabled')) !!}
                       </div>
               </div>



           <div class="position-relative row form-group">
                       <label for="nom" class="col-sm-2 col-form-label">Le coût</label>
                       <div class="col-sm-10">
                           {!! Form::number('Price', null, array('placeholder' => 'coût','class' => 'form-control','step' => '0.000001')) !!}
                       </div>
                </div>


                <div class="position-relative row form-group">
                    <label for="nom" class="col-sm-2 col-form-label">La Borne Inferieur</label>
                    <div class="col-sm-10">
                        {!! Form::number('Borninf', null, array('placeholder' => 'nombre minimum des SMS par palier','class' => 'form-control',)) !!}
                    </div>
            </div>


           <div class="position-relative row form-group">
                       <label for="nom" class="col-sm-2 col-form-label">La Borne Superieur</label>
                       <div class="col-sm-10">
                           {!! Form::number('Bornsup', null, array('placeholder' => 'nombre maximum des SMS par palier','class' => 'form-control',)) !!}
                       </div>
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
