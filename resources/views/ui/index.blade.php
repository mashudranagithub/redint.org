@extends('ui.layouts.master')

@section('content')

	<!-- About Section Start Here -->
	<section id="About" class="d-flex justify-content-center align-items-center white">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h2>Welcome to <span>Research and Entrepreneurship Development Ltd.</span></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center align-items-center text-center">
					<div class="about-text">
						<p>Research and Entrepreneurship Development Ltd is pioneer in transforming research into practice, promoting innovation and measurable impact, and establishing appropriate policies for the potential growth of the society. Our expertise is in using evidence-based and multidisciplinary approaches to solving major challenges in changing lives and livelihoods of marginalized people through training, skill development, ICT, and entrepreneurship development.</p>
						<a href="{{ route('background') }}" class="btn btn-red">Know More
							<i class="fas fa-angle-double-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About Section End Here -->


	<section id="Etra">
		<div class="etra-backgrounds">
			<div class="etra-part education"></div>
			<!-- <div class="etra-part training"></div> -->
			<div class="etra-part research"></div>
			<div class="etra-part advocacy"></div>
		</div>
		<div class="etra-contents">
			<div class="etra-part education">
				<div class="etra-content-inner text-center">
					<i class="fas fa-project-diagram"></i>
					<h2>Studies</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At iusto eveniet nam reiciendis nesciunt ab exercitationem ...</p>

					<a href="{{ route('studies') }}" class="btn btn-red">Learn More
						<i class="fas fa-angle-double-right"></i>
					</a>
				</div>
			</div>
			<div class="etra-part research">
				<div class="etra-content-inner text-center">
					<i class="fas fa-newspaper"></i>
					<h2>Publications</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At iusto eveniet nam reiciendis nesciunt ab exercitationem ...</p>
					<a href="{{ route('publications') }}" class="btn btn-red">Learn More
						<i class="fas fa-angle-double-right"></i>
					</a>
				</div>				
			</div>
			<div class="etra-part advocacy">
				<div class="etra-content-inner text-center">
					<i class="fas fa-file-powerpoint"></i>
					<h2>Presentations</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At iusto eveniet nam reiciendis nesciunt ab exercitationem ...</p>
					<a href="{{ route('presentations') }}" class="btn btn-red">Learn More
						<i class="fas fa-angle-double-right"></i>
					</a>
				</div>				
			</div>
		</div>
	</section>

	<!-- project section start here -->
	<section id="Projects" class="d-flex justify-content-center align-items-center gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h2>Our Projects</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel projects-slider">
						@foreach($researches as $research)
						<div class="single-project full-box">
							<div class="single-project-image">
								<a href="{{ route('single-research', $research->id) }}">
									<img src="{{ asset('ui/assets/images/research/'.$research->research_image) }}" alt="project Image">
								</a>
							</div>
							<div class="single-project-info info-box">
								<h3><a href="{{ route('single-research', $research->id) }}">{{ $research->research_title }}</a></h3>
								{!! Str::limit($research->research_detail, $limit = 120, $end = ' ...') !!}
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="{{ route('researches') }}" class="btn btn-red view-all">All projects</a>
				</div>
			</div>
		</div>
	</section>
	<!-- project section end here -->


	<!-- Publication Section Start Here -->
	<section id="Publication" class="white">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h2>Publications</h2>
					</div>
				</div>
			</div>
			<div class="row">
<!-- 				<div class="col-md-6">
					<div class="latest-publication">
						<div class="publication-image">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/publication/usgs-k7WetNdaY6A-unsplash.jpg') }}" alt="Publication Image">
							</a>
						</div>
						<div class="latest-publication-info">
							<h4>Lorem ipsum dolor sit amet</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, dolore. Corrupti illo ducimus perspiciatis fuga inventore hic necessitatibus alias aspernatur!</p>
							<a href="javascript:void(0);" class="btn btn-red know-more">Know more</a>
						</div>
					</div>
				</div> -->
				<div class="col-md-12">
					<div class="publication-list">

						@foreach($publications as $publication)
						<div class="single-article">
						   <div class="article-info">
						      <a target="_blank" href="{{$publication->link}}">{{ $publication->title }}</a>
						   </div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="{{ route('publications') }}" class="btn btn-red view-all">All Publications</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Publication Section End Here -->



	<section id="News-events" class="d-flex justify-content-center align-items-center gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h2>News & Events</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel news-events-slider">
						<!-- Single news event start here -->
						<div class="single-news-event">
							<div class="news-event-image">
								<a href="#">
									<img src="{{ asset('ui/assets/img/news&events/news&events.jpg') }}" alt="News & Events Image">
								</a>
							</div>
							<div class="news-event-info d-flex">
								<div class="event-date">
									<span>15</span>August
								</div>
								<div class="event-info">
									<div class="time-place">
										<p class="event-time">9.30 AM - 5.00 PM</p>
										<p class="event-place">Brac James P Grant School of Public Health</p>
									</div>
									<h3><a href="#">Event Name</a></h3>
								</div>
							</div>
						</div><!-- Single news event end here -->
						<!-- Single news event start here -->
						<div class="single-news-event">
							<div class="news-event-image">
								<a href="#">
									<img src="{{ asset('ui/assets/img/news&events/news&events.jpg') }}" alt="News & Events Image">
								</a>
							</div>
							<div class="news-event-info d-flex">
								<div class="event-date">
									<span>15</span>August
								</div>
								<div class="event-info">
									<div class="time-place">
										<p class="event-time">9.30 AM - 5.00 PM</p>
										<p class="event-place">Brac James P Grant School of Public Health</p>
									</div>
									<h3><a href="#">Event Name</a></h3>
								</div>
							</div>
						</div><!-- Single news event end here -->
						<!-- Single news event start here -->
						<div class="single-news-event">
							<div class="news-event-image">
								<a href="#">
									<img src="{{ asset('ui/assets/img/news&events/news&events.jpg') }}" alt="News & Events Image">
								</a>
							</div>
							<div class="news-event-info d-flex">
								<div class="event-date">
									<span>15</span>August
								</div>
								<div class="event-info">
									<div class="time-place">
										<p class="event-time">9.30 AM - 5.00 PM</p>
										<p class="event-place">Brac James P Grant School of Public Health</p>
									</div>
									<h3><a href="#">Event Name</a></h3>
								</div>
							</div>
						</div><!-- Single news event end here -->
						<!-- Single news event start here -->
						<div class="single-news-event">
							<div class="news-event-image">
								<a href="#">
									<img src="{{ asset('ui/assets/img/news&events/news&events.jpg') }}" alt="News & Events Image">
								</a>
							</div>
							<div class="news-event-info d-flex">
								<div class="event-date">
									<span>15</span>August
								</div>
								<div class="event-info">
									<div class="time-place">
										<p class="event-time">9.30 AM - 5.00 PM</p>
										<p class="event-place">Brac James P Grant School of Public Health</p>
									</div>
									<h3><a href="#">Event Name</a></h3>
								</div>
							</div>
						</div><!-- Single news event end here -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="javascript:void(0);" class="btn btn-red view-all">All News & Events</a>
				</div>
			</div>
		</div>
	</section>

	<section id="Partners">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h2>Partners</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel partners-slider">
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
						<div class="single-partner">
							<a href="javascript:void(0);">
								<img src="{{ asset('ui/assets/img/partners/partner.png') }}" alt="Partner Image">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection