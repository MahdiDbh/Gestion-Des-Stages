@extends('layouts.master')

@section('title')
    Gestion des Permissions
@endsection

@section('css')

@endsection

@section('page_title')
Gestion des Permissions
@endsection

@section('page_title1')
Gestion des Permissions
@endsection

@section('page_title2')
Gestion des Permissions
@endsection

@section('content')
@can('permission-create')
<div class="" style="margin-left: 1cm; margin-bottom:1cm">
    <a class="btn btn-success" href="{{ route('permissions.create') }}"> Céer une permission</a>
</div>
@endcan


<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>N°</th>
          <th>Permission</th>
          <th>Guard name</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $permissions)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $permissions->name }}</td>
    <td>{{ $permissions->guard_name }}</td>
    <td>
       <a class="btn btn-info" href="{{ route('permissions.show',$permissions->id) }}">voir</a>
       @can('permission-edit')
       <a class="btn btn-primary" href="{{ route('permissions.edit',$permissions->id) }}">Modifier</a>
       @endcan
        @can('permission-delete')
        {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permissions->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger delete-user'] ) !!}
        {!! Form::close() !!}
        @endcan

    </td>
  </tr>
 @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>N°</th>
                <th>Permission</th>
                <th>Guard name</th>
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
    $('.delete-user').click(function(e){
        e.preventDefault() // comfirmer avant supprimer
        if (confirm('voulez vous vraiment supprimer cet utilisateur de façon permanente ?')) {
            // Post the form
            $(e.target).closest('form').submit()
        }
    });
</script>
@endsection
