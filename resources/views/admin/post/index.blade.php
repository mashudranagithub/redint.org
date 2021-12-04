@extends('admin.layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Posts</li>
        </ol>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('all-posts') }}"> Back</a>
    </div>
</section>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create-post') }}"> Create New post</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @php $i=0; @endphp
	    @foreach ($posts as $post)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $post->title }}</td>
            <td>{{ $post->type }}</td>
	        <td>
                <form action="{{ route('delete-post',$post->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('show-post',$post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('edit-post',$post->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['delete-post', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $posts->links() !!}

@endsection