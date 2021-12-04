@extends('ui.layouts.master')

@section('content')

<section id="Page-heading" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if(isset($events[0]))
					@if($events[0]->event_status=="running")
					<h2>Workshop/Seminar</h2>
					@elseif($events[0]->event_status=="upcoming")
					<h2>Events</h2>
					@else
					<h2>Awards</h2>
					@endif
				@else
				<h2>No Data Found!</h2>
				@endif
			</div>
		</div>
	</div>
</section>

<section id="Page-content" class="white events-page">
	<div class="container">
		<div class="row">

			@foreach($events as $event)
			<div class="col-md-4">
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

					<h4><a href="{{ route('single-event', $event->id) }}">{{Str::limit($event->event_title, $limit = 30, $end = ' ...')}}</a></h4>
				</div>
			</div>
			@endforeach

			{{$events->links()}}
			
		</div>
	</div>
</section>

@endsection