@extends('admin.layouts.master')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">All Activities</li>
  </ol>
</section>

<!-- Main content -->
<section class="content group-members">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('editReport', $report->id) }}">Edit Report</a></button>
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
            <div class="box-header with-border">
            	<h3 class="box-title text-aqua">{{ $report->report_title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="row">
            		<div class="col-md-12">
                  <h3></h3>
            			<embed src="{{ url('front/assets/files/report/'.$report->report_file) }}" style="width:100%;min-height: 90vh;">
            		</div>
            	</div>
            </div>
          </div>
          <!-- /.box -->
        </div>


	</div>
</section>

@endsection