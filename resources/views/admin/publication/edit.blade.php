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
    <li class="active">Publication Edit</li>
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
      <button type="button" class="btn btn-success btn-lg"><a style="color: #fff;" href="{{ route('all-publications') }}">All Publications</a></button>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <form role="form" action="{{ route('update-publication', $publication->id) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="box-body">
          <h2>Publication Edit Form</h2>
          <hr>
          <div class="form-group">
              <label for="type">Publication Type</label>
              <select name="type" id="type" class="form-control" required>
                  <option @if($publication->type == 'journal') {{'selected'}} @endif value="journal">Journal</option>
                  <option @if($publication->type == 'abstract') {{'selected'}} @endif value="abstract">Abstract</option>
                  <option @if($publication->type == 'newspaper') {{'selected'}} @endif value="newspaper">Newspaper</option>
              </select>
          </div>
          <div class="form-group">
            <label for="title">Publication Title</label>
            <textarea name="title" class="form-control" id="title" cols="30" rows="5" required>{{$publication->title}}</textarea>
          </div>


          <div class="form-group">
            <label for="link">Link</label>
            <input name="link" type="url" class="form-control" id="link" value="{{ $publication->link }}" required>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Publication Update</button>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection