@extends('layouts.master')

@section('title')
    Palier 
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des couts
@endsection

@section('page_title1')
Palier
@endsection

@section('page_title2')
Palier
@endsection

@section('content')
@php
use App\Models\operateurs;
@endphp
<div class="card  mt-5">
    @can('palier-create')


    <div class="card-header">

        <button class=" mr-3 btn btn-primary"> <a href="{{ route('paliers.create') }}" class="" style="color:#FFF ;text-decoration:none" >Ajouter un palier</a>
        </button>

    </div>
    @endcan
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>SMSC</th>
                <th>Coût</th>
                <th>Borne Inf</th>
                <th>Borne Sup</th>
                <th>Action</th>



            </tr>
            </thead>
                <tbody>
                    @foreach($palier as $x)
                    <tr>
                        @php

                            $smsc= operateurs::select('SMSC_id')->where('ID_Operateur',$x->SMSC);
                            $smsc= $smsc->get() ;
                            $smsc = $smsc[0];
                        @endphp
                        <td>{{$smsc->SMSC_id}}</td>
                        <td>{{$x->Price}} DA</td>
                        <td>{{$x->Borninf}} </td>
                        <td>
                            {{ $x->Bornsup }}

                        </td>
                        <td>


                            @can('palier-edit')  <a class="btn btn-primary" href="{{ route('paliers.edit',$x->id) }}">Modifier</a> @endcan
                            @can('palier-delete')     {!! Form::open(['method' => 'DELETE','route' => ['paliers.destroy', $x->id],'style'=>'display:inline']) !!}
                                     {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-palier'] ) !!} @endcan
                                 {!! Form::close() !!}

                        </td>

                    </tr>
                     @endforeach
                </tbody>
    </table>
</div>
@endsection

@section('scripts')

<script>
    $('.delete-palier').click(function(e){
        e.preventDefault() // comfirmer avant supprimer
        if (confirm('voulez vous vraiment supprimer ce palier de façon permanente ?')) {
            // Post the form
            $(e.target).closest('form').submit()
        }
    });
</script>

@endsection
