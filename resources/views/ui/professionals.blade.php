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
			<div class="col-md-12">
				<div class="members-list">

					@foreach($members as $member)
					<div class="single-member d-flex">
						<div class="member-image">
							<img src="{{ asset('ui/assets/images/members/'.$member->type.'/'.$member->photo) }}" alt="Member Image">
						</div>
						<div class="member-info">
							<h4><a href="javascript:void(0)">{{$member->name}} - ({{$member->designation}})</a></h4>
							{!!$member->bio!!}
							<p class="interest"><em>Research Interest: </em>{{$member->interests}}</p>
							<p class="email"><em>Email: </em>{{$member->email}}</p>
						</div>
					</div>
					@endforeach

					{{ $members->links() }}

				</div>
			</div>
		</div>
	</div>
</section>


@endsection