@extends('layouts.master')

@section('title')
    Evaluation
@endsection

@section('css')

@endsection

@section('page_title')
Modifier une evaluation
@endsection

@section('page_title1')
Modifier
@endsection

@section('page_title2')
evaluation
@endsection

@section('content')

<div class="col-md-12">
    <div class="card-body" style="padding: 3.25rem;">

               {!! Form::model($evaluation, ['method' => 'PATCH','route' => ['evaluation.update', $evaluation->id]]) !!}
               {{csrf_field()}}


            {!! Form::text('id', null, array('class' => 'form-control ', 'hidden')) !!}

            






            <div class="form-group">
            <strong>Stagiaire</strong>
            <select name="stagiaire" id="st" class="form-control">
              @foreach($stagiaire as $st)
              <option value='{{ $st->id }}'> {{$st->name}} </option>
              @endforeach
            </select>

            <strong>Type d'évaluation</strong>
            <select name="type_evaluation"  class="form-control">
              <option value="periodique">Périodique</option>
              <option value="finale">Finale</option>
            </select>

        </div>
                <label for="inputName">Note</label>
                
                <div class="col-sm-10" >
                           {!! Form::number('note', null, array('placeholder' => 'Groupe','class' => 'form-control' )) !!}
                       </div>                
                       
              <label>Remarque</label>
              <div class="col-sm-10">
                           {!! Form::textarea('remarque', null, array('placeholder' => 'Groupe','class' => 'form-control' )) !!}
                       </div> 

              <div class="form-group">
                    
      </div>

    

    <div class="position-relative row form-check">
                       <div class="col-sm-10 offset-sm-2">
                           <button class="mt-1 btn btn-primary" type="submit">Modifier</button>
                       </div>
                   </div>
  </form>
  <!-- /.card-body -->
           {!! Form::close() !!}
   </div>
</div>

@endsection

@section('scripts')

@endsection
