@extends('ui.layouts.master')

@section('content')

<section id="Page-heading" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Our Professionals</h2>
			</div>
		</div>
	</div>
</section>

<section id="Page-content" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="sidebar-centre-link">
					<ul class="nav nav-pills nav-justified nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="executive-directors-tab" data-toggle="tab" href="#executive-directors" role="tab" aria-controls="executive-directors" aria-selected="true"><h4>Executive Director (ED)</h4></a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="directors-tab" data-toggle="tab" href="#directors" role="tab" aria-controls="directors" aria-selected="false"><h4>Directors</h4></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="tab-content">
					<div class="tab-pane fade active show" id="executive-directors" role="tabpanel" aria-labelledby="executive-directors-tab">
						<h3>Executive Director (ED)</h3>
						<div class="members-list">

							<div class="single-member d-flex">
								<div class="member-image">
									<a href="javascript:void(0);">
										<img src="{{ asset('ui/assets/img/publication/water-management.jpg') }}" alt="Publication Image">
									</a>
								</div>
								<div class="member-info">
									<h4><a href="javascript:void(0)">Member Name</a></h4>
									<p>Member designation</p>
									<a href="javascript:void(0);" class="btn btn-red know-more" target="_blank">Know more</a>
								</div>
							</div>

						</div>
					</div>
					<div class="tab-pane fade" id="directors" role="tabpanel" aria-labelledby="directors-tab">
						<h3>Directors</h3>
						<div class="members-list">
							
							<div class="single-member d-flex">
								<div class="member-image">
									<a href="javascript:void(0);">
										<img src="{{ asset('ui/assets/img/publication/water-management.jpg') }}" alt="Publication Image">
									</a>
								</div>
								<div class="member-info">
									<h4>
										<a href="javascript:void(0)">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
									</h4>
									<a href="javascript:void(0);" class="btn btn-red know-more" target="_blank">Know more</a>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection