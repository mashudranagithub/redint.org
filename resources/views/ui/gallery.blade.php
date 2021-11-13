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
					<h3>Gallery</h3>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">

				<div class="gallery">

					<div class="row">

						@foreach($photos as $photo)

						<div class="col-md-4">
							<a href="{{ asset('ui/assets/gallery/photos/'.$photo->photo ) }}" title="{{ $photo->photo_caption }}">
								<img src="{{ asset('ui/assets/gallery/photos/'.$photo->photo ) }}" alt="Gallery image" />
							</a>
						</div>

						@endforeach


					</div>
					

				</div>


			</div>
		</div>

	</div>
</section>


@endsection