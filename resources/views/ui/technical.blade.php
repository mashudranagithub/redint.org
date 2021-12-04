@extends('ui.layouts.master')

@section('content')

<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>{{ $post[0]->title }}</h3>
				<br>
				<div class="red-text-image">
					@if($post[0]->image)
					<img src="{{ asset('ui/assets/images/post/'.$post[0]->type.'/'.$post[0]->image) }}" alt="RED Background Image">
					@endif
					<p>{!! $post[0]->detail !!}</p>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection