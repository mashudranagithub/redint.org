@extends('admin.layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Post Update</li>
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
<form action="{{ route('update-post', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea id="bhw-ckeditor" class="form-control" style="height:150px" name="detail">{{$post->detail}}</textarea>
            </div>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="type">Post Type</label>
                <select name="type" class="form-control" id="type" required>
                    <option>Select Type</option>
                    <option @if($post->type=="about-organization") selected @endif value="about-organization">about-organization</option>
                    <option @if($post->type=="vision") selected @endif value="vision">vision</option>
                    <option @if($post->type=="mission") selected @endif value="mission">mission</option>

                    <option @if($post->type=="studies") selected @endif value="studies">Studies</option>
                    <option @if($post->type=="publications") selected @endif value="publications">Publications</option>
                    <option @if($post->type=="presentations") selected @endif value="presentations">Presentations</option>

                    <option @if($post->type=="consultancy") selected @endif value="consultancy">consultancy</option>
                    <option @if($post->type=="social-services") selected @endif value="social-services">social-services</option>
                    <option @if($post->type=="technical-notes") selected @endif value="technical-notes">technical-notes</option>
                </select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-6">
            @if($post->image)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <img src="{{ asset('ui/assets/images/post/'.$post->type.'/'.$post->image)}}" alt="Post image">
            </div>
            @endif
            <div class="form-group">
                <label for="image">Post Image</label>
                <input name="image" type="file" id="image">
                <p class="help-block text-red">Size: 688px width and 655px height and compress the image from <a target="_blank" href="https://tinypng.com/">here</a> before upload</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection