@extends('admin.layouts.master')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Show Event</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('editEvent', $event->id) }}">Edit This Event</a></button>
		</div>
	</div>

	@if ($msg = Session::get('msg'))
	    <div class="alert alert-success">
	        <p>{{ $msg }}</p>
	    </div>
	@endif

	<div class="row">
		<div class="col-md-12 col-lg-12 col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h2 class="box-title text-aqua" style="padding:10px 15px; font-size: 25px;">{{ $event->event_title }}</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding:15px 20px;">
             	<div class="blog-image">
             		<img style="width:100%;margin-bottom:25px;" src="{{ url('front/assets/images/event/'.$event->event_image) }}" alt="Event Image">
             	</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="event-meta">
                    <p style="font-size: 20px; font-weight: 700;">Event Date: {{ $event->event_date }}</p>
                    <p style="font-size: 20px; font-weight: 700;">Event Time: {{ $event->event_start_time }} - {{ $event->event_end_time }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="event-meta">
                    <p style="font-size: 20px; font-weight: 700;">Event Place: {{ $event->event_place }}</p>
                    <p style="font-size: 20px; font-weight: 700;">Event Status: {{ $event->event_status }}</p>
                  </div>
                </div>
              </div>
             	<div class="blog-detail">
             		{!! $event->event_detail !!}
             	</div>
            </div>
          </div>
          <!-- /.box -->
        </div>

	</div>
</section>

@endsection