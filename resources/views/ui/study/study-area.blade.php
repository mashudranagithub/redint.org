@extends('ui.layouts.master')

@section('content')

<section id="Page-banner">
	<img src="{{ asset('ui/assets/images/study/banners/'.$study->banner) }}" alt="Page Banner Image">
</section>

<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="page-heading">
					<h3>{{ $study->name }}</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="study-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					{{ $study->description }}

					<ul class="projects">

						@if(! $study_list->isEmpty())

							@foreach($study_list as $single_study)

							<li><a href="{{ route('study', $single_study->id) }}" >{{ $single_study->title }}</a></li>

							@endforeach

						@else
							<b class="btn-warning p-1"><strong>There is no study list in this area!</strong></b>
						@endif
						
					</ul>


				</div>
			</div>
		</div>
	</div>



	<div class="studies-list">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-4">
					<hr>
					<h3 class="mt-4">Our All Studies</h3>
				</div>
			</div>
			<div class="row">
				@foreach($study_areas as $study)
				<div class="col-md-4">
					<div class="single-study">
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