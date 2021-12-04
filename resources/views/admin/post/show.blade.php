@extends('admin.layouts.master')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">

</section>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('all-posts') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        @if($post->image)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img src="{{ asset('ui/assets/images/post/'.$post->type.'/'.$post->image)}}" alt="Post image">
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            {!! $post->detail !!}
        </div>
    </div>
@endsection