@extends('layouts.master')

@section('title')
    Gestion d'utilisateurs
@endsection

@section('css')

@endsection

@section('page_title')
Gestion d'utilisateurs
@endsection

@section('page_title1')
    Accueil
@endsection

@section('page_title2')
Gestion d'utilisateurs
@endsection
@section('content')

<div class="" style="margin-left: 1cm; margin-bottom:1cm">
        <a class="btn btn-success" href="{{ route('sujet.create') }}"> Céer un sujet</a>
</div>

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Identifiant</th>
          <th>Nom d'utilisateur</th>
          <th>E-mail</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Logs</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Modifier</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-user'] ) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Identifiant</th>
            <th>Nom d'utilisateur</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
<script>
    $('.sujet-delete').click(function(e){
        e.preventDefault() // comfirmer avant supprimer
        if (confirm('voulez vous vraiment supprimer cet sujet de façon permanente ?')) {
            // Post the form
            $(e.target).closest('form').submit()
        }
    });
</script>
@endsection
