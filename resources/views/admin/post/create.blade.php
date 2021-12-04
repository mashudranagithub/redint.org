@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Post Create</li>
        </ol>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('all-posts') }}"> Back</a>
    </div>
</section>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('store-post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea id="bhw-ckeditor" class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="type">Post Type</label>
                <select name="type" class="form-control" id="type" required>
                    <option>Select Type</option>
                    <option value="about-organization">About-organization</option>
                    <option value="vision">Vision</option>
                    <option value="mission">Mission</option>
                    <option value="studies">Studies</option>
                    <option value="publications">Publications</option>
                    <option value="presentations">Presentations</option>
                    <option value="consultancy">Consultancy</option>
                    <option value="social-services">Social Services</option>
                    <option value="technical-notes">Technical Notes</option>
                </select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="image">Post Image</label>
                <input name="image" type="file" id="image">
                <p class="help-block text-red">Size: 688px width and 655px height and compress the image from <a target="_blank" href="https://tinypng.com/">here</a> before upload</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection