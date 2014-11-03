@extends('layouts.admin')

@section('inner_content')
<h1>All Artwork</h1>
<a href="{{ URL::to('admin/artworks/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add a New Piece</a>

<nav class="navbar navbar-default">
    <div class="container-fluid" style="padding-left:0">
	<ul class="nav navbar-nav">
	    <li class="active"><a href="#">View All</a></li>
	    <li><a href="#">Active Auctions</a></li>
	    <li><a href="#">Portfolio</a></li>
	</ul>
	<form method="get" class="navbar-form navbar-right">
	    <div class="input-group">
		<input type="text" class="form-control">
		<span class="input-group-btn">
		    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
		</span>
	    </div>
	</form>
    </div>
</nav>
<div class="pull-right">
    {{ $artworks->links() }}
</div>
<strong>Sort by: </strong>
<div class="btn-group" style="margin-right:15px">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Date Added</button>
    <ul class="dropdown-menu" role="menu">
	<li><a href="#">Date Created</a></li>
	<li><a href="#">Title</a></li>
	<li><a href="#">Price</a></li>
    </ul>
    <button class="btn btn-info"><i class="fa fa-caret-down"></i></button>
</div>
<strong>{{ $artworks->count() }}</strong> total pieces.

<table class="table table-hover table-portfolio" cellspacing="0">
    <thead>
	<th>Thumbnail</th>
	<th>Date Added</th>
	<th>Date Created</th>
	<th>Title</th>
	<th>Sold Price</th>
	<th>Description</th>
	<th>Actions</th>
    </thead>
    @if($artworks->count() > 0)
    @foreach($artworks as $artwork)
    <tr>
	<td>
	    @if(empty($artwork->thumbnail_path))
	    <img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt="">
	    @else
	    {{ $artwork->getThumbnail(300) }}
	    @endif
	</td>
	<td>{{ $artwork->created_at }}</td>
	<td>{{ $artwork->date_created }}</td>
	<td>{{ $artwork->title }}</td>
	<td>${{ $artwork->sold_price }}</td>
	<td>{{ $artwork->description }}</td>
	<td>
	    {{ Form::open(array('method' => 'delete', 'route' => array('admin.artworks.destroy', $artwork->id) )) }}
	    <div class="btn-group">
		<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this artwork?')"><i class="fa fa-trash"></i></button>
		<a href="{{ URL::route('admin.artworks.edit', $artwork->id) }}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
		<a href="{{ URL::route('portfolio.show', $artwork->id) }}" class="btn btn-default"><i class="fa fa-external-link"></i></a>
		@if(!empty($artwork->auction_link))
		<a href="{{ $artwork->auction_link }}" class="btn btn-default"><i class="fa fa-gavel"></i></a>
		@endif
	    </div>
	    {{ Form::close() }}
	</td>
    </tr>
    @endforeach
    @else
    <tr>
	<td colspan="7">You don't have any artworks yet! Why not {{ link_to('admin/artworks/create', 'add one now') }}?</td>
    </tr>
    @endif
</table>
@stop