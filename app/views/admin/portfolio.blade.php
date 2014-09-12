@extends('layouts.admin')

@section('inner_content')
<h1>All Artwork</h1>
<a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add a New Piece</a>
<div class="clearfix"></div>
<ul class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
</ul>
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