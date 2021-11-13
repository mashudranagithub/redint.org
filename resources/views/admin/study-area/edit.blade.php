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
    <li class="active">Study Area Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content group-members">
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('all-study-area') }}">All Study Area</a></button>
		</div>
	</div>

	@if ($msg = Session::get('msg'))
	    <div class="alert alert-success">
	        <p>{{ $msg }}</p>
	    </div>
	@endif

	<div class="row">
		
		
		<div class="col-lg-12 col-xs-12">
			<form role="form" action="{{ route('update-study-area', $study_area->id) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
              <div class="box-body">
              	<h2>Study Area Edit Form</h2>
              	<hr>

                <div class="form-group">
                  <label for="name">Study Area Name</label>
                  <input name="name" value="{{ $study_area->name }}" type="text" class="form-control" id="name" required>
                </div>

                <div class="form-group">
                  <label for="banner">Study Area Banner</label>
                  <br>
                  @if($study_area->banner)
                  <img style="max-width: 100%;margin-bottom: 10px;" src="{{ asset('ui/assets/images/study/banners/'.$study_area->banner) }}" alt="Study Area Banner">
                  @endif
                  <input name="banner" type="file" id="banner">

                  <p class="help-block text-red">Size: 1920px width and 500px height and compress the image from <a target="_blank" href="https://tinypng.com/">here</a> before upload</p>
                </div>

                <div class="form-group">
                  <label for="square_image">Study Area Square Image</label>
                  <br>
                  @if($study_area->banner)
                  <img style="max-width: 500px;margin-bottom: 10px;" src="{{ asset('ui/assets/images/study/square-images/'.$study_area->square_image) }}" alt="Study Area Square Image">
                  @endif
                  <input name="square_image" type="file" id="square_image">

                  <p class="help-block text-red">Size: 550px width and 400px height and compress the image from <a target="_blank" href="https://tinypng.com/">here</a> before upload</p>
                </div>

                <div class="form-group">
                  <label for="description">Study Area Description</label>
                  <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{$study_area->description }}
                  </textarea>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Study Area Update</button>
                </div>

              </div>
              <!-- /.box-body -->


            </form>
		</div>

	</div>

</section>

@endsection