@extends('ui.layouts.master')

@section('content')


<section id="Page-heading" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Network and Partnership</h2>
			</div>
		</div>
	</div>
</section>

<section id="Page-content" class="white">
	<div class="container">
		<div class="row">
			@foreach($partners as $partner)
			<div class="col-md-3">
				<div class="single-partner">
					<a target="_blank" href="{{$partner->link}}">
						<img src="{{ asset('ui/assets/images/partners/'.$partner->image)}}" alt="Partner Image">
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>


@endsection