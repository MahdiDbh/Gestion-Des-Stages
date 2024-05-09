@extends('layouts.master')

@section('title')
    GESTION DES STAGES
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/app3.css')}}">
@endsection

@section('page_title')
Accueil
@endsection

@section('page_title1')
    Accueil
@endsection

@section('page_title2')
    Dashboard
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>@if(isset($totalsujet)) {{ $totalsujet  }} @endif</h3>

                  <p>Sujet</p>
                </div>
                <div class="icon">
                  <i class="fa fa-telegram"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>@if(isset($totaluser)) {{ $totaluser  }} @endif<sup style="font-size: 20px"></sup></h3>

                  <p>Utilisateur<strong></strong></p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>@if(isset($totalfichier)) {{ $totalfichier  }} @endif </h3>

                  <p>Fichier<strong></strong></p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>@if(isset($totalstage)) {{ $totalstage  }} @endif</h3>

                  <p>Stage<strong></strong></p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
            
            <!----------chart 1--------->
           
            <!-----------chart 2------------>
            
            <!------div------>
          </div>

            </div class="chart-container">
             </div>
          </div>
          <!-- /.row -->
          <!-- Main row -->
        </section>

@endsection
@section('scripts')

@endsection
