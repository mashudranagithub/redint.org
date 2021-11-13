@extends('ui.layouts.master')

@section('content')

<section id="Page-heading" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Researches</h2>
			</div>
		</div>
	</div>
</section>

<section id="Page-content" class="white">
	<div class="container">
		<div class="row">

			@foreach($research_list as $research)
			<div class="col-md-4">
				<div class="single-project full-box">
					<div class="single-project-image">
						<a href="{{ route('single-research', $research->id) }}">
							<img src="{{ asset('ui/assets/images/research/'.$research->research_image) }}" alt="project Image">
						</a>
					</div>
					<div class="single-project-info info-box">
						<h3><a href="{{ route('single-research', $research->id) }}">{{ $research->research_title }}</a></h3>
						{!! Str::limit($research->research_detail, $limit = 100, $end = ' ...') !!}
					</div>
				</div>
			</div>
			@endforeach

			{{$research_list->links()}}
			
		</div>
	</div>
</section>

@endsection