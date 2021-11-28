@extends('ui.layouts.master')

@section('content')

<section id="Page-heading" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Our Panel of Advisors</h2>
			</div>
		</div>
	</div>
</section>

<section id="Page-content" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="members-list">

					<div class="single-member d-flex">
						<div class="member-image">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/publication/water-management.jpg') }}" alt="Publication Image">
							</a>
						</div>
						<div class="member-info">
							<h4><a href="javascript:void(0)">Member Name - (Member Designation)</a></h4>
							<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Harum aut quas unde, odio nemo, ea rerum ratione, quidem molestiae aliquid ab minus doloribus cupiditate vero sed placeat, reprehenderit error eveniet soluta. Ex explicabo distinctio at!</p>
							<p class="interest"><em>Research Interest: </em>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, explicabo aperiam aspernatur maiores quam consectetur!</p>
							<a href="javascript:void(0);" class="btn know-more" target="_blank">Know more</a>
						</div>
					</div>

					<div class="single-member d-flex">
						<div class="member-image">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/publication/water-management.jpg') }}" alt="Publication Image">
							</a>
						</div>
						<div class="member-info">
							<h4><a href="javascript:void(0)">Member Name - (Member Designation)</a></h4>
							<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Harum aut quas unde, odio nemo, ea rerum ratione, quidem molestiae aliquid ab minus doloribus cupiditate vero sed placeat, reprehenderit error eveniet soluta. Ex explicabo distinctio at!</p>
							<p class="interest"><em>Research Interest: </em>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, explicabo aperiam aspernatur maiores quam consectetur!</p>
							<a href="javascript:void(0);" class="btn know-more" target="_blank">Know more</a>
						</div>
					</div>

					<div class="single-member d-flex">
						<div class="member-image">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/publication/water-management.jpg') }}" alt="Publication Image">
							</a>
						</div>
						<div class="member-info">
							<h4><a href="javascript:void(0)">Member Name - (Member Designation)</a></h4>
							<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Harum aut quas unde, odio nemo, ea rerum ratione, quidem molestiae aliquid ab minus doloribus cupiditate vero sed placeat, reprehenderit error eveniet soluta. Ex explicabo distinctio at!</p>
							<p class="interest"><em>Research Interest: </em>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, explicabo aperiam aspernatur maiores quam consectetur!</p>
							<a href="javascript:void(0);" class="btn know-more" target="_blank">Know more</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>


@endsection