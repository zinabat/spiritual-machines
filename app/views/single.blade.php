@extends('layouts.basic')

@section('styles')
    @parent
    {{ HTML::style('css/flexslider.css') }}
@stop

@section('left_corner')
<a href="{{ URL::route('portfolio.index') }}" data-toggle="tooltip" data-placement="right" title="Portfolio View"><i class="fa fa-th fa-3x"></i></a>
@stop

@section('inner_content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
	<div class="video-container">
	    <nav class="nav-single">
		<a href="#" title="Previous" class="prev"><i class="fa fa-angle-left"></i></a>
		<a href="#" title="Next" class="next"><i class="fa fa-angle-right"></i></a>
	    </nav>
	    {{ $artwork->getThumbnail(900) }}
	    <!--<div class="embed-responsive embed-responsive-16by9">
		<iframe src="//www.youtube.com/embed/LP_-P7ZcWZU" allowfullscreen></iframe>
	    </div>-->
	</div>
	<br>
	<div class="row">
	    <div class="col-md-3 text-center">
		@if($artwork->isActive())
		<div class="price">$</div>
		<small class="text-muted">current bid</small><br><br>
		<a href="{{ $artwork->auction_link }}" class="btn btn-primary btn-lg full-width">bid now</a>
		@else
		<div class="price">${{ $artwork->sold_price }}</div>
		<br>
		<button class="btn btn-danger btn-lg full-width" disabled>auction closed</button>
		@endif
	    </div>
	    <div class="col-md-9">
		<h3 class="text-success no-mt">{{ $artwork->title }}</h3>
		<p>{{ $artwork->description }}</p>
	    </div>
	</div>
    </div>
</div>
@stop

@section('footer')
<div class="flexslider carousel">
    <ul class="slides">
	<li>
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=''>
	</li>
	<li>
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=''>
	</li>
	<li>
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=''>
	</li>
	<li>
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=''>
	</li>
	<li>
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=''>
	</li>
	<li>
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=''>
	</li>
	<li>
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=''>
	</li>
    </ul>
</div>
@stop

@section('scripts')
{{ HTML::script('js/jquery.flexslider-min.js') }}
<script>
$(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 300,
      itemMargin: 1,
      controlNav: false,
      slideshow: false
    });
    
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop