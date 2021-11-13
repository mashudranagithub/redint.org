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
    <li class="active">All Study Areas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content group-members">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('create-study-area') }}">Create New Study Area</a></button>
		</div>
	</div>

	@if ($msg = Session::get('msg'))
	    <div class="alert alert-success">
	        <p>{{ $msg }}</p>
	    </div>
	@endif

	<div class="row">

		<div class="col-md-12 col-lg-12 col-xs-12">
			<h2>All Study Areas</h2>
			<hr>
		</div>

	</div>

	<div class="row">
		@foreach($study_areas as $study_area)
		<div class="col-md-4 col-lg-4 col-xs-12" style="height: 370px;">
			<div class="box box-success">
	            <div class="box-header with-border text-center">
	              <h3 class="box-title text-aqua" style="text-transform: uppercase;font-weight: 700;">{{ $study_area->name }}</h3>
	            </div>
	            <div class="box-body">
	            	<img style="max-width: 100%;margin-bottom: 10px;" src="{{ asset('ui/assets/images/study/square-images/'.$study_area->square_image) }}" alt="Study Banner Image">
	            	<div style="display: flex; justify-content: space-between;">
	            		<button type="button" class="btn btn-warning btn-lg"><a style="color: #fff;" href="{{ route('edit-study-area', $study_area->id) }}">Edit Study</a></button>

	            		{!! Form::open(['method' => 'DELETE','route' => ['delete-study-area', $study_area->id],'style'=>'display:inline']) !!}
							{!! Form::submit('Delete Study Area', ['class' => 'btn btn-danger btn-lg']) !!}
						{!! Form::close() !!}
	            	</div>
	            </div>
	        </div>
        </div>
		@endforeach
	</div>

</section>

@endsection