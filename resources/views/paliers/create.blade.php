@extends('layouts.master')

@section('title')
    Palier
@endsection

@section('css')

@endsection

@section('page_title')
Ajouter un palier
@endsection

@section('page_title1')
Palier
@endsection

@section('page_title2')
Palier
@endsection

@section('content')

<div class="col-md-12">


    <div class="card-body">

        <form action="{{route('paliers.store')}}" method="POST">
        @csrf

            <div class="position-relative row form-group">
                <label for="nom" class="col-sm-2 col-form-label">SMSC</label>
                <div class="col-sm-10">

                    <select name="SMSC" id="select-beast" class="form-control">
                        @foreach ($op as $x)
                        <option value="{{$x->ID_Operateur}}">{{$x->SMSC_id}}</option>
                        @endforeach
                    </select>


                    </div>
            </div>
            <div class="position-relative row form-group">
                <label for="nom" class="col-sm-2 col-form-label">Le Coût</label>
                <div class="col-sm-10">
                    <input name="Price" id="Price" placeholder="coût" type="number" step="0.000001" class="form-control" value="">
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="nom" class="col-sm-2 col-form-label">La Borne Inferieur</label>
                <div class="col-sm-10">
                    <input name="Borninf" id="Bornsup" placeholder="nombre minimum des SMS par palier" type="number" class="form-control" value="Borninf">
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="nom" class="col-sm-2 col-form-label">La Borne Superieur</label>
                <div class="col-sm-10">
                    <input name="Bornsup" id="Bornsup" placeholder="nombre maximum des SMS par palier" type="number" class="form-control" value="Bornsup">
                </div>
            </div>


            <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button class="mt-1 btn btn-primary" type="submit" style="position: center;">Ajouter</button>
                </div>
            </div>
        </form>

    </div>


</div>

@endsection

@section('scripts')

@endsection
