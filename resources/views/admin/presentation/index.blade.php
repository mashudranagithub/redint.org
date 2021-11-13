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
    <li class="active">All Presentations</li>
  </ol>
</section>

<!-- Main content -->
<section class="content group-members">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('create-presentation') }}">Add New Presentation</a></button>
		</div>
	</div>

	@if ($msg = Session::get('msg'))
	    <div class="alert alert-success">
	        <p>{{ $msg }}</p>
	    </div>
	@endif
	<div class="row">
	@foreach($presentations as $presentation)
		<div class="col-md-4">
          <div class="box">

          	<div class="box-header">
          		<h4><b>Uploaded at:</b> {{ date('d M, Y', strtotime($presentation->updated_at)) }}</h4>
          	</div>

            <!-- /.box-header -->
            <div class="box-body">


            	<iframe src="{{ url ('ui/assets/files/presentations/'.$presentation->presentation_file)}}" type="file" style="width:100%; height: 250px;"></iframe>


            </div>

            <div class="box-footer">
            					<a class="btn btn-primary" href="{{ route('show-presentation', $presentation->id) }}">Show</a>
				<a class="btn btn-primary" href="{{ route('edit-presentation', $presentation->id) }}">Edit</a>
				{!! Form::open(['method' => 'DELETE','route' => ['delete-presentation', $presentation->id],'style'=>'display:inline']) !!}
				  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
            </div>
          </div>
          <!-- /.box -->
        </div>
	@endforeach

	<br>

	<div class="col-md-12">
		{{ $presentations->links() }}
	</div>

	</div>
</section>

@endsection