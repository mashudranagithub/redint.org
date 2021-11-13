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
					<h3>Studies</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>Lorem ipsum dolor sit amet, consectetur, adipisicing elit. Praesentium magnam necessitatibus, dolor. Odio, doloremque corrupti ratione perferendis illum quis cupiditate blanditiis rem, recusandae cum tenetur unde. Perferendis cum, illo est repellendus quis illum tempore quae error odio! Voluptatum ratione aperiam architecto quae laudantium error labore, veritatis sapiente quos. Dolorem obcaecati nulla aliquid itaque, perspiciatis veniam fuga! Ipsam unde sint amet consequuntur quas vitae ex, distinctio saepe magnam ullam numquam adipisci voluptate, aut nulla sequi ipsa quibusdam hic dolorem ab quos.</p>
			</div>
		</div>
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