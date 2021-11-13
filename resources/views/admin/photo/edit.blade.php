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
    <li class="active">Edit Photo</li>
  </ol>
</section>

<!-- Main content -->
<section class="content group-members">
  <div class="row" style="margin-bottom:30px;">
    <div class="col-md-12 text-right">
      <button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('allPhotos') }}">All Photo</a></button>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  @if ($msg = Session::get('msg'))
      <div class="alert alert-success">
          <p>{{ $msg }}</p>
      </div>
  @endif

  <div class="row">

    <div class="col-lg-12 col-xs-12">
      <form role="form" action="{{ route('updatePhoto', $photo->id) }}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
              <div class="box-body">
                <h2>Photo Edit Form</h2>
                <hr>
                <div class="form-group">
                    <label for="photo_caption">Photo Caption</label>
                    <textarea name="photo_caption" class="form-control" id="photo_caption" cols="30" rows="2">{{ $photo->photo_caption }}</textarea>
                </div>
                <div class="form-group">

                  @if($photo)
                    <img style="max-width: 300px;" src="{{ url('ui/assets/gallery/photos/'.$photo->photo) }}" alt="Gallery Photo"> <br> <br>
                  @endif
                  <label for="photo">Image</label>
                  <input name="photo" type="file" id="photo">

                  <p class="help-block text-red">Size: 600px width and 550px height and compress the image from <a target="_blank" href="https://tinypng.com/">here</a> before upload</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Photo Update</button>
              </div>
            </form>
    </div>

  </div>

</section>

@endsection