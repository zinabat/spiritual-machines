@extends('layouts.basic')

@section('inner_content')
    <h1>Portfolio</h1>
    <p>This page will render thumbnails of all artworks.</p>
    <div class="row portfolio-thumbs">
	<div class="col-md-3">
	    <a href="#">
		<div class="price-tag">$357</div>
		<img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt="">
	    </a>
	</div>
	<div class="col-md-3">
	    <a href="#">
		<div class="price-tag">SOLD</div>
		<img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt="">
	    </a>
	</div>
	<div class="col-md-3">
	    <a href="#"><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></a>
	</div>
	<div class="col-md-3">
	    <a href="#"><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></a>
	</div>
    </div>
@stop