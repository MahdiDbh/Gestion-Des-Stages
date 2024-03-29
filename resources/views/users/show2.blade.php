@extends('layouts.master')

@section('title')
    Gestion d'utilisateurs
@endsection

@section('css')

@endsection

@section('page_title')
Profil d'utilisateur
@endsection

@section('page_title1')
Gestion d'utilisateurs
@endsection

@section('page_title2')
Profil
@endsection
@section('content')

<div class="" style="margin-left: 0.5cm;">
    <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
</div>

<div class="row" style="margin-top:0.5cm; margin-left: 0.5cm;">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
