@extends('layouts.template')

@section('styles')
{{ HTML::style('css/style.css') }}
@show

@section('header')
<div id="corner-pieces">
    <div class="top-left">@yield('left_corner')</div>
    <div class="top-right"></div>
    <div class="bot-left"></div>
    <div class="bot-right"></div>
</div>

<header class="text-center">
    <h1 class="brand">Spiritual Machines</h1>
    <nav>
	<ul class="list-inline">
	    <li><a href="{{ URL::to('/') }}">auction</a></li>
	    <li><a href="{{ URL::to('portfolio') }}">portfolio</a></li>
	    <li><a href="{{ URL::to('about') }}">about</a></li>
	    <li><a href="{{ URL::to('contact') }}">contact</a></li>
	</ul>
    </nav>
</header>
@stop

@section('content')
<div class="container">
    @yield('inner_content')
</div>
@stop

@section('footer')
<hr>
<footer id="main-footer">
    <span class="text-muted">copyright &copy; spiritualmachines.ca 2014</span>
</footer>
@stop