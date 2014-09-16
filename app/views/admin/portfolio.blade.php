@extends('layouts.admin')

@section('inner_content')
<h1>All Artwork</h1>
<a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add a New Piece</a>

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
<ul class="pagination pull-right no-mt">
    <li><a href="#">&laquo;</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
</ul>
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
<strong>2</strong> total pieces.

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
    <tr>
	<td><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></td>
	<td>Sep 12, 2014</td>
	<td>Feb 01, 2013</td>
	<td>The Wind's Face</td>
	<td>$342</td>
	<td>Lorem ipsum dolor sit amet...</td>
	<td>
	    <div class="btn-group">
		<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
		<button class="btn btn-default"><i class="fa fa-pencil"></i></button>
		<button class="btn btn-default"><i class="fa fa-share"></i></button>
		<button class="btn btn-default"><i class="fa fa-external-link"></i></button>
	    </div>
	</td>
    </tr>
    <tr>
	<td><img src="http://snapsort.com/learn/movie-capability/images/sixteen-by-nine-example.jpg" alt=""></td>
	<td>Sep 12, 2014</td>
	<td>Feb 01, 2013</td>
	<td>The Wind's Face</td>
	<td>$342</td>
	<td>Lorem ipsum dolor sit amet...</td>
	<td>
	    <div class="btn-group">
		<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
		<button class="btn btn-default"><i class="fa fa-pencil"></i></button>
		<button class="btn btn-default"><i class="fa fa-share"></i></button>
		<button class="btn btn-default"><i class="fa fa-external-link"></i></button>
	    </div>
	</td>
    </tr>
</table>
@stop