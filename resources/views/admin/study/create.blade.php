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
    <li class="active">Study Create</li>
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
      <button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('all-study') }}">All Study</a></button>
    </div>
  </div>
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<form role="form" action="{{ route('store-study') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        	<h2>Study Create Form</h2>
        	<hr>

          <div class="form-group">
            <label for="study_areas_id">Select Study Area</label>
            <select name="study_areas_id" id="study_areas_id" class="form-control" required="">
              <option value="">Select One Study Area</option>
              @foreach($study_areas as $s_area)
              <option value="{{ $s_area->id }}">{{ $s_area->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Research Title" required>
          </div>

          <div class="form-group">
            <label for="external_link">External Link</label>
            <input name="external_link" type="url" class="form-control" id="external_link" placeholder="External LInk">
          </div>

          <div class="form-group">
            <label for="pdf_file">PDF File</label>
            <input name="pdf_file" type="file" class="form-control" id="pdf_file" placeholder="PDF File" accept=".pdf">
          </div>


          <div class="form-group">
            <label for="bhw-ckeditor">Detail</label>
            <textarea name="desc_one" id="bhw-ckeditor" class="form-control" cols="30" rows="10" required></textarea>
          </div>


          <div class="form-group">
            <label for="bhw-ckeditor">More Detail</label>
            <textarea name="desc_two" id="bhw-ckeditor" class="form-control" cols="30" rows="10"></textarea>
          </div>


        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Study Create</button>
        </div>
      </form>
		</div>
	</div>
</section>

@endsection