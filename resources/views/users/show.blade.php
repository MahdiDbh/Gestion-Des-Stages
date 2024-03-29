@extends('layouts.master')

@section('title')
    Gestion d'utilisateurs
@endsection

@section('css')

@endsection

@section('page_title')
Historique d'utilisateur
@endsection

@section('page_title1')
Gestion d'utilisateurs
@endsection

@section('page_title2')
Historique
@endsection
@section('content')

<div class="" style="margin-left: 1cm; margin-bottom: 1cm;">
    <a class="btn btn-primary" href="{{ route('users.index') }}">Retour</a>
</div>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nom d'utilisateur</th>
          <th>E-mail</th>
          <th>Role</th>
          <th>Description</th>
          <th>Date/Heure</th>
        </tr>
        </thead>
        <tbody>


            @foreach ($log as $entry)
  <tr>

    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
    </td>
    <td>{{ $entry->description }}</td>
    <td>{{ $entry->created_at }}</td>

  </tr>
            @endforeach


        </tbody>
        <tfoot>
        <tr>
            <th>Nom d'utilisateur</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Description</th>
            <th>Date/Heure</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
