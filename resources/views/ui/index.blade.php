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
						<p>{!!Str::limit($about[0]->detail, 450)!!}</p>
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
			<div class="etra-part research"></div>
			<div class="etra-part advocacy"></div>
		</div>
		<div class="etra-contents">
			<div class="etra-part education">
				<div class="etra-content-inner text-center">
					<i class="fas fa-project-diagram"></i>
					<h2>@if(isset($study_post[0])) {{$study_post[0]->title}} @else Studies @endif</h2>
					@if(isset($study_post[0]))
					{!! Str::limit($study_post[0]->detail, 120) !!}
					@else
					<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Nemo, eaque. Reprehenderit odit, accusantium expedita corrupti ...</p>
					@endif
					<a href="{{ route('studies') }}" class="btn btn-red">Know More
						<i class="fas fa-angle-double-right"></i>
					</a>
				</div>
			</div>
			<div class="etra-part research">
				<div class="etra-content-inner text-center">
					<i class="fas fa-newspaper"></i>
					<h2>@if(isset($publication_post[0])) {{$publication_post[0]->title}} @else Publications @endif</h2>
					@if(isset($publication_post[0]))
					{!! Str::limit($publication_post[0]->detail, 120) !!}
					@else
					<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Nemo, eaque. Reprehenderit odit, accusantium expedita corrupti ...</p>
					@endif
					<a href="{{ route('publications') }}" class="btn btn-red">Know More
						<i class="fas fa-angle-double-right"></i>
					</a>
				</div>				
			</div>
			<div class="etra-part advocacy">
				<div class="etra-content-inner text-center">
					<i class="fas fa-file-powerpoint"></i>
					<h2>@if(isset($presentation_post[0])) {{$presentation_post[0]->title}} @else Presentations @endif</h2>
					@if(isset($presentation_post[0]))
					{!! Str::limit($presentation_post[0]->detail, 120) !!}
					@else
					<p>Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Nemo, eaque. Reprehenderit odit, accusantium expedita corrupti ...</p>
					@endif
					<a href="{{ route('presentations') }}" class="btn btn-red">Know More
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
						<h2>Our Research Projects</h2>
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

						@foreach($events as $event)
						<div class="single-news-event">
							<div class="news-event-image">
								<a href="{{ route('single-event', $event->id) }}">
									<img src="{{ asset('ui/assets/images/event/'.$event->event_image) }}" alt="News & Events Image">
								</a>
							</div>
							<div class="news-event-info d-flex">
								<div class="event-date">
									<span>{{$event->event_date}}</span>
								</div>
								<div class="event-info">
									<div class="time-place">
										<p class="event-time">{{$event->event_start_time}} - {{$event->event_end_time}}</p>
										<p class="event-place">{{$event->event_place}}</p>
									</div>
								</div>
							</div>

							<h3><a href="{{ route('single-event', $event->id) }}">{{Str::limit($event->event_title, $limit = 30, $end = ' ...')}}</a></h3>
						</div>
						@endforeach

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="{{ route('events') }}" class="btn btn-red view-all">All News & Events</a>
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
						@foreach($partners as $partner)
						<div class="single-partner">
							<a target="_blank" href="{{$partner->link}}">
								<img src="{{ asset('ui/assets/images/partners/'.$partner->image)}}" alt="Partner Image">
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection