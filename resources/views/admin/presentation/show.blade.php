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
    <li class="active">Presentation</li>
  </ol>
</section>

<!-- Main content -->
<section class="content group-members">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('all-presentations') }}">All Presentation</a></button>
      <button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('edit-presentation', $presentation->id) }}">Edit Presentation</a></button>
		</div>
	</div>

	@if ($msg = Session::get('msg'))
	    <div class="alert alert-success">
	        <p>{{ $msg }}</p>
	    </div>
	@endif
	<div class="row">

		<div class="col-md-12 col-lg-12 col-xs-12">
      <div class="box box-success">
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="row">
        		<div class="col-md-12 mt-4 mb-4">
              <iframe src="{{ url ('ui/assets/files/presentations/'.$presentation->presentation_file)}}" type="file" style="width:100%; height: 550px;"></iframe >
        		</div>
        	</div>
        </div>
      </div>
      <!-- /.box -->
    </div>

	</div>
</section>

@endsection