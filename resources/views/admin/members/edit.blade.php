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
	<div class="row" style="margin-bottom:30px;">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('all-members') }}">Back to see all members</a></button>
			<button type="button" class="btn btn-warning btn-lg"><a style="color: #fff;" href="{{ route('show-member', $single_member->id) }}">Show</a></button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<form role="form" action="{{ route('update-member', $single_member->id) }}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
              <div class="box-body">
              	<h2>Member Edit Form</h2>
              	<hr>
                <div class="form-group">
                  <label for="member-image">Member Image</label>
                  @if($single_member->photo)
					<div class="single-member-image">
						<img style="max-height: 100px;" src="{{ url ('ui/assets/images/members/'.$single_member->type.'/'.$single_member->photo)}}" alt="Member Image">
					</div>
                  @endif

                  <input name="photo" type="file" id="photo">

                  <p class="help-block text-red">Size: 688px width and 655px height and compress the image from <a target="_blank" href="https://tinypng.com/">here</a> before upload</p>
                </div>
                <div class="form-group">
                  <label for="name">Member Name</label>
                  <input name="name" type="text" class="form-control" id="name" value="{{ $single_member->name }}" required>
                </div>
                <div class="form-group">
                  <label for="designation">Member Designation</label>
                  <input name="designation" type="text" class="form-control" id="designation" value="{{ $single_member->designation }}" required>
                </div>
                <div class="form-group">
                  <label for="email">Member Email</label>
                  <input name="email" type="email" class="form-control" id="email" value="{{ $single_member->email }}" required>
                </div>
                <div class="form-group">
                  <label for="position">Member Position</label>
                  <input name="position" type="number" class="form-control" id="position" value="{{ $single_member->position }}" required>
                </div>


                <div class="form-group">
                  <label for="group-name">Group Name</label>
                  <select name="type" class="form-control" id="group-name" required>
                    <option value="{{ $single_member->type }}" selected>{{ $single_member->type }}</option>
                    <option value="professionals">Professionals</option>
                    <option value="advisors">Advisors</option>
                    <option value="management">Management</option>
                  </select>
                </div>


                <div class="form-group">
                  <label for="bio">Member Bio</label>
                  <textarea name="bio" class="form-control" rows="5" id="bio">{!! $single_member->bio !!}
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="interests">Member Interests</label>
                  <textarea name="interests" class="form-control" rows="5" id="interests">{{ $single_member->interests }}
                  </textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Member Information</button>
              </div>
            </form>
		</div>
	</div>
</section>



@endsection