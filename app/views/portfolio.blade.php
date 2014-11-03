@extends('layouts.basic')

@section('left_corner')
<a href="{{ URL::route('portfolio.show', 0) }}" data-toggle="tooltip" data-placement="right" title="Slideshow View"><i class="fa fa-play fa-3x"></i></a>
@stop

@section('inner_content')
    <h1>Portfolio</h1>
    <p>This page will render thumbnails of all artworks.</p>
    @include('includes.portfolio-thumbs')
    
@stop