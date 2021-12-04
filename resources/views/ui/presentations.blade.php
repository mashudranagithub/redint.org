@extends('ui.layouts.master')

@section('content')

<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading">
					<h3>@if(isset($presentation_post[0])) {{$presentation_post[0]->title}} @else Presentations @endif </h3>
				</div>
			</div>
		</div>
		@if(isset($presentation_post[0]))
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				{!!$presentation_post[0]->detail!!}
			</div>
		</div>
		@endif
		<div class="row">
			<div class="col-md-12">
				@foreach($presentations as $presentation)
				<iframe src="{{ url ('ui/assets/files/presentations/'.$presentation->presentation_file)}}" width="100%" height="700px;" frameborder="0"></iframe>
				@endforeach
				<br>
				<br>
				{{ $presentations->links() }}
			</div>
		</div>

	</div>
</section>

@endsection