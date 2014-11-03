@extends('layouts.basic')

@section('inner_content')
<h2>Latest Auction</h2>
<hr>
<div class="row">
    <div class="col-md-4">
	<div class="row">
	    <div class="col-md-5 text-center">
		<div class="price">$100</div>
		<small class="text-muted">current bid</small>
	    </div>
	    <div class="col-md-7">
		<br>
		<button class="btn btn-primary btn-lg full-width">bid now</button>
	    </div>
	</div>
	<h3 class="text-success">Title of Work</h3>
	<p>Lorem ipsum dolor met.</p>
	<p><a href="#">Read more <i class="fa fa-caret-right"></i></a></p>
    </div>
    <div class="col-md-8">
	<div class="embed-responsive embed-responsive-16by9">
	    <iframe src="//www.youtube.com/embed/LP_-P7ZcWZU" allowfullscreen></iframe>
	</div>
    </div>
</div>
<hr>
<p>More items up for auction now.</p>
@include('includes.portfolio-thumbs')
@stop
