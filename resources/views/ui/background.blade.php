@extends('ui.layouts.master')

@section('content')

<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>{{ $background[0]->title }}</h3>
				<br>
				<div class="red-text-image">
					@if($background[0]->image)
					<img src="{{ asset('ui/assets/images/post/'.$background[0]->type.'/'.$background[0]->image) }}" alt="RED Background Image">
					@endif
					<p>{!! $background[0]->detail !!}</p>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection