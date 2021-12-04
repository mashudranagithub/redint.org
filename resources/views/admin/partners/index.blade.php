@extends('admin.layouts.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="pull-left">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Partners</li>
        </ol>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('all-partners') }}"> Back</a>
    </div>
</section>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Partners</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create-partner') }}"> Create New Partner</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered dark">
        <tr>
            <th>Serial</th>
            <th>Partner Image</th>
            <th>Partner Link</th>
            <th width="280px">Action</th>
        </tr>
        @php $i=0; @endphp
	    @foreach ($partners as $partner)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>
                <img style="max-width: 200px; max-height: 120px;" src="{{ asset('ui/assets/images/partners/'.$partner->image)}}" alt="Partner image">
			</td>
            <td><a target="_blank" href="{{ $partner->link }}">{{ $partner->link }}</a></td>
	        <td style="display: flex;">
                <a style="display: inline-block; margin-right: 15px;" class="btn btn-primary" href="{{ route('edit-partner',$partner->id) }}">Edit</a>
                <form action="{{ route('delete-partner',$partner->id) }}" method="POST">
                    {!! Form::open(['method' => 'DELETE','route' => ['delete-partner', $partner->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $partners->links() !!}

@endsection