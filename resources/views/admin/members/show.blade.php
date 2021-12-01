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
    <li class="active">Group Member</li>
  </ol>
</section>

@if ($msg = Session::get('msg'))
    <div class="alert alert-success">
        <p>{{ $msg }}</p>
    </div>
@endif

<!-- Main content -->
<section class="content">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('all-members') }}">Back to see all members</a></button>
			<button type="button" class="btn btn-warning btn-lg"><a style="color: #fff;" href="{{ route('edit-member', $single_member->id) }}">Edit</a></button>
		</div>
	</div>
	<div class="row mt-4">
		<div class="box">
			<div class="box-body">
				<div class="col-md-5 col-lg-5 col-xs-12">
					<div class="single-member-image">
						<img style="max-width: 100%;" src="{{ url ('ui/assets/images/members/'.$single_member->type.'/'.$single_member->photo)}}" alt="Group Member Image">
					</div>
				</div>
				<div class="col-md-7 col-lg-7 col-xs-12">
					<div class="single-member-details">
						<h3>{{ $single_member->name }}</h3>
						<h4>{{ $single_member->designation }}</h4>
						<p>{{ $single_member->bio }}</p>
						<p><b>Interests: </b>{{ $single_member->interests }}</p>
						<h5 class="email"><b>Email:</b> {{ $single_member->email }}</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection