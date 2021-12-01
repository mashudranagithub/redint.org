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
    <li class="active">Member Create</li>
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
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<form role="form" action="{{ route('store-member') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
              	<h2>Member Create Form</h2>
              	<hr>
                <div class="form-group">
                  <label for="photo">Member Photo</label>
                  <input name="photo" type="file" id="photo" required>

                  <p class="help-block text-red">Size: 688px width and 655px height and compress the image from <a target="_blank" href="https://tinypng.com/">here</a> before upload</p>
                </div>
                <div class="form-group">
                  <label for="name">Member Name</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Member Name" required>
                </div>
                <div class="form-group">
                  <label for="designation">Member Designation</label>
                  <input name="designation" type="text" class="form-control" id="designation" placeholder="Member Designation" required>
                </div>
                <div class="form-group">
                  <label for="email">Member Email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email ex: example@email.com" required>
                </div>

                <div class="form-group">
                  <label for="type">Member Type</label>
                  <select name="type" class="form-control" id="type" required>
                    <option>Select Type</option>
                    <option value="professionals">Professionals</option>
                    <option value="advisors">Advisors</option>
                    <option value="management">Management</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="bio">Member Detail</label>
                  <textarea name="bio" class="form-control" rows="5" placeholder="bio ..." id="bhw-ckeditor"></textarea>
                </div>

                <div class="form-group">
                  <label for="interests">Research Interests</label>
                  <textarea name="interests" class="form-control" rows="5" placeholder="interests ..." id="interests"></textarea>
                </div>

                <div class="form-group">
                  <label for="position">Member Position</label>
                  <input name="position" type="number" class="form-control" id="position" placeholder="1" value="1" required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Member Create</button>
              </div>
            </form>
		</div>
	</div>
</section>



@endsection