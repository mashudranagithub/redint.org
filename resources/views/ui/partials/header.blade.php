<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Research and Entrepreneurship Development Ltd.</title>
    <link rel="icon" href="{{ asset('ui/assets/img/logo/favicon.ico') }}">
    

    <!-- CSS -->
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/simpleLightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/red.css') }}">
</head>
<body>


<!-- Header start here -->
		<header id="Header">
			<div class="header-top">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-md-4">
							<!-- Top social menu start here -->
							<div class="top-social-menu">
								<ul>
									<li>
										<a target="_blank" href="{{$settings->facebook}}">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a target="_blank" href="{{$settings->facebook}}">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a target="_blank" href="{{$settings->facebook}}">
											<i class="fab fa-linkedin"></i>
										</a>
									</li>
									<li>
										<a target="_blank" href="{{$settings->facebook}}">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
									<li>
										<a target="_blank" href="{{$settings->facebook}}">
											<i class="fab fa-youtube"></i>
										</a>
									</li>
								</ul>
							</div>
							<!-- Top social menu end here -->
						</div>
					</div>
				</div>
			</div>
			<div class="header-main">
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-md-3">
							<div class="logo">
								<a href="{{ route('homepage') }}">
									<img src="{{ asset('ui/assets/images/settings/'.$settings->logo) }}" alt="Logo Image">
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="main-menu d-flex justify-content-end">
								<nav class="navbar navbar-expand-lg navbar-light">
		                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		                                <span class="navbar-toggler-icon"></span>
		                            </button>
		                            <div class="collapse navbar-collapse" id="navbarResponsive">
		                                <ul class="navbar-nav ml-auto">
		                                    <li class="first-drop-menu">
		                                        <a href="{{ route('background') }}">About Us</a>
		                                        <ul class="first-dropped-menu">
		                                            <li><a href="{{ route('background') }}">The organization</a></li>
		                                            <li><a href="{{ route('visionMission') }}">Vision & Mission</a></li>
		                                            <li><a href="{{ route('professionals') }}">Our professionals</a></li>
		                                            <li><a href="{{ route('advisors') }}">Panel of advisors and Experts</a></li>
		                                            <li><a href="{{ route('networkPartners') }}">Network and Partnership</a></li>
		                                            <li><a href="{{ route('management') }}">Management</a></li>
		                                        </ul>
		                                    </li>

		                                    <li class="first-drop-menu">
		                                        <a href="#">Services</a>
		                                        <ul class="first-dropped-menu">
		                                            <li class="second-drop-menu">
		                                                <a href="{{ route('researches') }}">Research and Development</a>
		                                                <ul class="second-dropped-menu">
															@foreach($researches as $research)
		                                                    <li><a href="{{ route('single-research', $research->id) }}">{{ Str::limit($research->research_title, 20, '...') }}</a></li>
															@endforeach
		                                                </ul>
		                                            </li>
		                                            <li><a href="{{ route('consultancy') }}">Consultancy</a></li>
		                                            <li class="second-drop-menu">
		                                                <a href="#">Policy advocacy</a>
		                                                <ul class="second-dropped-menu">
		                                                    <li><a href="{{ route('presentations') }}">Presentations</a></li>
		                                                    <li><a href="{{ route('workshops') }}">Workshop/Seminar</a></li>
		                                                </ul>
		                                            </li>
		                                            <li><a href="{{ route('social') }}">Social and Professional services</a></li>
		                                            <li><a href="{{ route('studies') }}">Studies</a></li>
		                                        </ul>
		                                    </li>
		                                    <li><a href="{{ route('studies') }}">Studies</a></li>
		                                    <li class="first-drop-menu">
		                                        <a href="#">Resources</a>
		                                        <ul class="first-dropped-menu">
		                                            <li><a href="{{ route('publications') }}">All Publications</a></li>
		                                            <li><a href="{{ route('technical') }}">Technical Notes</a></li>
		                                        </ul>
		                                    </li>
		                                    <li>
		                                        <a href="{{ route('events') }}">News & Events</a>
		                                    </li>
		                                    <li>
		                                        <a href="{{ route('awards') }}">Awards</a>
		                                    </li>
		                                    <li>
		                                        <a href="{{ route('gallery') }}">Gallery</a>
		                                    </li>
		                                    <li>
		                                        <a href="{{ route('contact') }}">Contact</a>
		                                    </li>
		                                </ul>
		                            </div>
		                        </nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header end here -->