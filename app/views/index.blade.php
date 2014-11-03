@extends('layouts.basic')

@section('inner_content')
<h2>Latest Auction</h2>
<hr>
<div class="row">
    <div class="col-md-4">
	<div class="row">
	    <div class="col-md-5 text-center">
		<div class="price">$</div>
		<small class="text-muted">current bid</small>
	    </div>
	    <div class="col-md-7">
		<br>
		<a href="{{ $newest->auction_link }}" class="btn btn-primary btn-lg full-width">bid now</a>
	    </div>
	</div>
	<h3 class="text-success">{{ $newest->title }}</h3>
	<p>{{ $newest->description }}</p>
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
