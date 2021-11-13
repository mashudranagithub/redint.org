@extends('ui.layouts.master')

@section('content')

<section id="Page-banner">
	<img src="{{ asset('ui/assets/images/research/'.$research->research_image) }}" alt="Page Banner Image">
</section>

<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="page-heading">
					<h3>{{ $research->research_title }}</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="study-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					{!! $research->research_detail !!}

				</div>
			</div>
		</div>
	</div>



	<div class="studies-list">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-4">
					<hr>
					<h3 class="mt-4">Our All Research</h3>
				</div>
			</div>
			<div class="row">
				@foreach($researches as $s_research)
				<div class="col-md-4">
					<div class="single-study">
						<p class="single-study-title">
							<a href="{{ route('single-research', $s_research->id) }}">{{ Str::limit($s_research->research_title, 30) }}</a>
						</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>


</section>


@endsection