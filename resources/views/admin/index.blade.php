@extends('admin.layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$total_research}}</h3>
              <p>Researches</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{route('all-research')}}" class="small-box-footer">All Researches<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$total_publication}}</h3>
              <p>Publications</p>
            </div>
            <div class="icon">
              <i class="fa fa-map"></i>
            </div>
            <a href="{{route('all-publications')}}" class="small-box-footer">Publications info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$total_events}}</h3>
              <p>Events</p>
            </div>
            <div class="icon">
              <i class="fa fa-map"></i>
            </div>
            <a href="{{route('all-events')}}" class="small-box-footer">Events info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$total_partners}}</h3>
              <p>Partners</p>
            </div>
            <div class="icon">
              <i class="fa fa-map"></i>
            </div>
            <a href="{{route('all-partners')}}" class="small-box-footer">Partners info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$total_study_areas}}</h3>
              <p>Study Areas</p>
            </div>
            <div class="icon">
              <i class="fa fa-map"></i>
            </div>
            <a href="{{route('all-study-area')}}" class="small-box-footer">Study Areas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$total_gallery_image}}</h3>
              <p>Images of Gallery</p>
            </div>
            <div class="icon">
              <i class="fa fa-map"></i>
            </div>
            <a href="{{route('allPhotos')}}" class="small-box-footer">Gallery info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

@endsection