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
						<h3>Journal articles, book chapters, reports & working papers</h3>
						<div class="articles-list">
                            @foreach($journals as $journal)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$journal->link}}">{{$journal->title}}</a>
                                </div>
                            </div>
                            @endforeach
						</div>
					</div>

					<div class="tab-pane fade" id="abstract" role="tabpanel" aria-labelledby="abstract-tab">
						<h3>Abstract publication</h3>
                        <div class="articles-list">
                            @foreach($abstracts as $abstract)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$abstract->link}}">{{$abstract->title}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
					</div>
					<div class="tab-pane fade" id="newspaper" role="tabpanel" aria-labelledby="newspaper-tab">
						<h3>Newspaper articles</h3>
                        <div class="articles-list">
                            @foreach($newspapers as $newspaper)
                            <div class="single-article">
                                <div class="article-info">
                                    <a target="_blank" href="{{$newspaper->link}}">{{$newspaper->title}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection