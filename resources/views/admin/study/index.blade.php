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
    <li class="active">All Studies</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('create-study') }}">Add New Study</a></button>
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
              <h3 class="box-title text-aqua">Studies</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
				<thead>
					<tr>
						<th width="80%">Title</th>
						<th>Action</th>
					</tr>
				</thead>


				<tbody>
				@if(isset($studies) & !empty($studies))
					@foreach($studies as $single_study)
					<tr>
						<td width="80%">{{ $single_study->title }}</td>
						<td>
					         <a class="btn btn-primary" href="{{ route('show-study', $single_study->id) }}">Show</a>
					         <a class="btn btn-primary" href="{{ route('edit-study', $single_study->id) }}">Edit</a>
					          {!! Form::open(['method' => 'DELETE','route' => ['delete-study', $single_study->id],'style'=>'display:inline']) !!}
					              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					          {!! Form::close() !!}
						</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td>No data available!</td>
					</tr>
				@endif
				</tbody>
			</table>
			@if(isset($studies) & !empty($studies))
			{{ $studies->links() }}
			@endif
            </div>
          </div>
          <!-- /.box -->
        </div>

	</div>
</section>

@endsection