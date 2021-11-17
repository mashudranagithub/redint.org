@extends('ui.layouts.master')

@section('content')

<section id="Page-heading" class="gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Publications</h2>
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
							<a class="nav-link active" id="journal-articles-tab" data-toggle="tab" href="#journal-articles" role="tab" aria-controls="journal-articles" aria-selected="true"><h4>Journal articles</h4></a>
						</li>
												
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book" aria-selected="false"><h4>Book chapters</h4></a>
						</li>
										
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="reports-tab" data-toggle="tab" href="#reports" role="tab" aria-controls="reports" aria-selected="false"><h4>Reports</h4></a>
						</li>
						
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="monograph-tab" data-toggle="tab" href="#monograph" role="tab" aria-controls="monograph" aria-selected="false"><h4>Monograph</h4></a>
						</li>				

						<li class="nav-item" role="presentation">
							<a class="nav-link" id="working-tab" data-toggle="tab" href="#working" role="tab" aria-controls="working" aria-selected="false"><h4>Working papers</h4></a>
						</li>
						
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="abstract-tab" data-toggle="tab" href="#abstract" role="tab" aria-controls="abstract" aria-selected="false"><h4>Abstract publication</h4></a>
						</li>
						
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="newspaper-tab" data-toggle="tab" href="#newspaper" role="tab" aria-controls="newspaper" aria-selected="false"><h4>Newspaper articles</h4></a>
						</li>
						
					</ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="tab-content">

					<div class="tab-pane fade active show" id="journal-articles" role="tabpanel" aria-labelledby="journal-articles-tab">
						<h3>Journal articles</h3>
						<div class="articles-list">
							@if(isset($journals))
                            @foreach($journals as $journal)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$journal->link}}">{{$journal->title}}</a>
                                </div>
                            </div>
                            @endforeach
							@endif
						</div>
					</div>

					<div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
						<h3>Book chapters</h3>
						<div class="articles-list">
							@if(isset($books))
                            @foreach($books as $book)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$book->link}}">{{$book->title}}</a>
                                </div>
                            </div>
                            @endforeach
							@endif
						</div>
					</div>
					
					<div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
						<h3>Reports</h3>
						<div class="articles-list">
							@if(isset($reports))
                            @foreach($reports as $report)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$report->link}}">{{$report->title}}</a>
                                </div>
                            </div>
                            @endforeach
							@endif
						</div>
					</div>
					
					<div class="tab-pane fade" id="monograph" role="tabpanel" aria-labelledby="monograph-tab">
						<h3>Monograph</h3>
						<div class="articles-list">
							@if(isset($monographs))
                            @foreach($monographs as $monograph)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$monograph->link}}">{{$monograph->title}}</a>
                                </div>
                            </div>
                            @endforeach
							@endif
						</div>
					</div>
					
					<div class="tab-pane fade" id="working" role="tabpanel" aria-labelledby="working-tab">
						<h3>Working Papers</h3>
						<div class="articles-list">
							@if(isset($workings))
                            @foreach($workings as $working)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$working->link}}">{{$working->title}}</a>
                                </div>
                            </div>
                            @endforeach
							@endif
						</div>
					</div>
					
					<div class="tab-pane fade" id="abstract" role="tabpanel" aria-labelledby="abstract-tab">
						<h3>Abstract publication</h3>
                        <div class="articles-list">
                        	@if(isset($abstracts))
                            @foreach($abstracts as $abstract)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$abstract->link}}">{{$abstract->title}}</a>
                                </div>
                            </div>
                            @endforeach
							@endif
                        </div>
					</div>
					
					<div class="tab-pane fade" id="newspaper" role="tabpanel" aria-labelledby="newspaper-tab">
						<h3>Newspaper articles</h3>
                        <div class="articles-list">
                        	@if(isset($newspapers))
                            @foreach($newspapers as $newspaper)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$newspaper->link}}">{{$newspaper->title}}</a>
                                </div>
                            </div>
                            @endforeach
							@endif
                        </div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection