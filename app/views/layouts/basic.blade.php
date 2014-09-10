@extends('layouts.template')

@section('style')
{{ HTML::style('css/style.css') }}
@stop

@section('header')
<header>
    <h1>Spiritual Machines</h1>
    <nav>
	<ul class="nav nav-pills">
	    <li><a href="{{ URL::to('auction') }}">auction</a></li>
	    <li><a href="{{ URL::to('portfolio') }}">portfolio</a></li>
	    <li><a href="#">about</a></li>
	    <li><a href="#">contact</a></li>
	</ul>
    </nav>
</header>
@stop