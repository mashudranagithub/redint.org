@extends('ui.layouts.master')

@section('content')

<section id="Page-banner">
	<img src="{{ asset('ui/assets/img/studies/study-banners/studies-banner.jpg') }}" alt="Page Banner Image">
</section>

<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-heading">
					<h3>@if(isset($study_post[0])) {{$study_post[0]->title}} @else Studies @endif</h3>
				</div>
			</div>
		</div>
		@if(isset($study_post[0])) 
		<div class="row">
			<div class="col-md-12">
				{!!$study_post[0]->detail!!}
			</div>
		</div>
		@endif
	</div>
	<div class="studies-list">
		<div class="container">
			<div class="row">

				@foreach($study_areas as $study)

				<div class="col-md-4">
					<div class="single-study">
						<div class="single-study-image">
							<a href="{{ route('studyArea', $study->id) }}">
								<img src="{{ asset('ui/assets/images/study/square-images/'.$study->square_image) }}" alt="Study Image">
							</a>
						</div>
						<p class="single-study-title">
							<a href="{{ route('studyArea', $study->id) }}">{{ $study->name }}</a>
						</p>
					</div>
				</div>

				@endforeach

			</div>
		</div>
	</div>
</section>


@endsection