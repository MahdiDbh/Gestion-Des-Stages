@extends('layouts.master')

@section('title')
    Gestion de Role
@endsection

@section('css')

@endsection

@section('page_title')
Créer un role
@endsection

@section('page_title1')
Gestion de role
@endsection

@section('page_title2')
Créer un role
@endsection
@section('content')
    <div class="" style="margin-left: 1cm;">
        <a class="btn btn-primary" href="{{ route('roles.index') }}">Retour</a>
    </div>
    <div class="row" style="margin-top:0.5cm; margin-left: 0.5cm;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success" style="color: darkblue">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
