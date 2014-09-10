@extends('layouts.basic')

@section('inner_content')
<h2>Latest Auction</h2>
<hr>
<div class="row">
    <div class="col-md-4">
        <span class="price">$100</span>
        <span>current bid</span>
        <button class="btn btn-primary">bid now</button>
        <h3>Title of Work</h3>
        <p>Lorem ipsum dolor met.</p>
    </div>
    <div class="col-md-8">
	<div class="embed-responsive embed-responsive-16by9">
	    <iframe src="//www.youtube.com/embed/LP_-P7ZcWZU" allowfullscreen></iframe>
	</div>
    </div>
</div>
<hr>
<p>More items up for auction now.</p>
<div class="row">
    <div class="col-md-3">
	<a href="#"><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></a>
    </div>
    <div class="col-md-3">
	<a href="#"><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></a>
    </div>
    <div class="col-md-3">
	<a href="#"><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></a>
    </div>
    <div class="col-md-3">
	<a href="#"><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></a>
    </div>
</div>
@stop
