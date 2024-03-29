@extends('layouts.master')

@section('title')
    Gestion des Permissions
@endsection

@section('css')

@endsection

@section('page_title')
Permission
@endsection

@section('page_title1')
Gestion des Permissions
@endsection

@section('page_title2')
Permission
@endsection
@section('content')

<div class="row" style="margin-top:0.5cm; margin-left: 0.5cm;">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            {{ $permission->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Guade:</strong>
            {{ $permission->guard_name }}
        </div>
    </div>
</div>

@endsection
