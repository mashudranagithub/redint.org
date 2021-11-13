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
    <li class="active">Presentation file upload</li>
  </ol>
</section>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif


<!-- Main content -->
<section class="content">
  <div class="row" style="margin-bottom:30px;">
    <div class="col-md-12 text-right">
      <button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('all-presentations') }}">All Presentations</a></button>
    </div>
  </div>
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<form role="form" action="{{ route('store-presentation') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="box-body">
        	<h2>Presentation Upload Form</h2>
        	<hr>

          <div class="form-group">
            <label for="presentation_file">Presentation file</label>
            <input name="presentation_file" type="file" id="presentation_file" required accept=".pdf">
            <br>

            <p class="btn btn-warning">Don't upload big file here!</p>
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Upload Presentation</button>
        </div>
      </form>
		</div>
	</div>
</section>



@endsection