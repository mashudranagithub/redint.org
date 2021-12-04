@extends('ui.layouts.master')

@section('content')

<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>{{ $vision[0]->title }}</h3>
				<br>
				<div class="red-text-image">
					@if($vision[0]->image)
					<img src="{{ asset('ui/assets/images/post/'.$vision[0]->type.'/'.$vision[0]->image) }}" alt="RED Vision Image">
					@endif
					<p>{!! $vision[0]->detail !!}</p>
				</div>
			</div>
			<div class="col-md-6">
				<h3>{{ $mission[0]->title }}</h3>
				<br>
				<div class="red-text-image">
					@if($mission[0]->image)
					<img src="{{ asset('ui/assets/images/post/'.$mission[0]->type.'/'.$mission[0]->image) }}" alt="RED Vision Image">
					@endif
					<p>{!! $mission[0]->detail !!}</p>
				</div>

			</div>
		</div>
	</div>
</section>

@endsection