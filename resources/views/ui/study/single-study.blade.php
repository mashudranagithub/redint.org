@extends('ui.layouts.master')

@section('content')


<section id="Page-content" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-heading">
					<h3>{{ $single_study->title }}</h3>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="container mb-4">
	<div class="row">

		<div class="col-md-12">


          <div class="mt-4 mb-4">
          	{!! $single_study->desc_one !!}
          </div>


          <div class="mt-4 mb-4">
          	{!! $single_study->desc_two !!}
          </div>

          <div class="mt-4">
            <label for="external_link">External Link</label>
            <a target="_blank" href="{{ $single_study->external_link }}">{{ $single_study->external_link }}</a>
          </div>


		</div>

		@if(isset($single_study->pdf_file))

		<div class="col-md-12 pt-4 mb-4">
			<embed src="{{ asset('ui/assets/files/study/'.$single_study->pdf_file ) }}" width="100%" height="800px;" type="">
		</div>

		@endif




	</div>
</div>

@endsection