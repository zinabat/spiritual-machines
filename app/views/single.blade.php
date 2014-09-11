@extends('layouts.basic')

@section('styles')
    @parent
    {{ HTML::style('css/flexslider.css') }}
@stop

@section('left_corner')
<a href="#" data-toggle="tooltip" data-placement="right" title="Thumbnail View"><i class="fa fa-th fa-3x"></i></a>
@stop

@section('inner_content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
	<div class="video-container">
	    <nav class="nav-single">
		<a href="#" title="Previous" class="prev"><i class="fa fa-angle-left"></i></a>
		<a href="#" title="Next" class="next"><i class="fa fa-angle-right"></i></a>
	    </nav>
	    <div class="embed-responsive embed-responsive-16by9">
		<iframe src="//www.youtube.com/embed/LP_-P7ZcWZU" allowfullscreen></iframe>
	    </div>
	</div>
	<br>
	<div class="row">
	    <div class="col-md-3 text-center">
		<div class="price">$100</div>
		<small class="text-muted">current bid</small><br><br>
		<button class="btn btn-primary btn-lg full-width">bid now</button>
	    </div>
	    <div class="col-md-9">
		<h3 class="text-success no-mt">Title of Work</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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