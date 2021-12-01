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
    <li class="active">All Members</li>
  </ol>
</section>

<!-- Main content -->
<section class="content group-members">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('create-member') }}">Create A New Member</a></button>
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
              <h3 class="box-title text-aqua">All Members</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			@foreach($members as $member)
					<tr>
						<td>
							<img src="{{ url ('ui/assets/images/members/'.$member->type.'/'.$member->photo)}}" style="width:100px;" alt="Member Image">
						</td>
						<td>{{ $member->name }}</td>
						<td>{{ $member->designation }}</td>
						<td>{{ $member->type }}</td>
						<td>
					         <a class="btn btn-primary" href="{{ route('show-member', $member->id) }}">Show</a>
					         <a class="btn btn-primary" href="{{ route('edit-member', $member->id) }}">Edit</a>
					          {!! Form::open(['method' => 'DELETE','route' => ['delete-member', $member->id],'style'=>'display:inline']) !!}
					              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					          {!! Form::close() !!}
						</td>
					</tr>
			@endforeach
				</tbody>
			</table>
            </div>
          </div>
          <!-- /.box -->
        </div>



	</div>
</section>

@endsection