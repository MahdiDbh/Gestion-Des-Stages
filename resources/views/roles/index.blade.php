@extends('layouts.master')

@section('title')
    Gestion de Role
@endsection

@section('css')

@endsection

@section('page_title')
Gestion de Role
@endsection

@section('page_title1')
Gestion de role
@endsection

@section('page_title2')
Gestion de Role
@endsection

@section('content')
<div class="pull-right" style="margin-left: 1cm;">
    @can('role-create')
        <a class="btn btn-success" href="{{ route('roles.create') }}"> Créer un nouveau role</a>
    @endcan
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card" style="margin-left: 1cm; margin-top: 1cm;">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Voir</a>
                        @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Modifier</a>
                        @endcan
                        @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-user']) !!}

                        @endcan
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Identifiant</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.delete-user').click(function(e){
        e.preventDefault(); // confirm before deleting
        if (confirm('Voulez-vous vraiment supprimer ce role de façon permanente ?')) {
            // Post the form
            $(e.target).closest('form').submit();
        }
    });
</script>
@endsection

{!! $roles->render() !!}
