@extends('layouts.template')

@section('styles')
{{ HTML::style('css/style.css') }}
{{ HTML::style('css/admin.css') }}
@stop

@section('header')
<nav class="navbar navbar-admin no-mb" role="navigation">
    <div class="container-fluid">
	<div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="{{ URL::to('/') }}">Spiritual Machines</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
		<li><a href="{{ URL::to('/') }}">auction</a></li>
		<li><a href="{{ URL::to('portfolio') }}">portfolio</a></li>
		<li><a href="{{ URL::to('about') }}">about</a></li>
		<li><a href="{{ URL::to('contact') }}">contact</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
		<li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
	    </ul>
	</div>
    </div>
</nav>
@stop

@section('content')
<div class="container-fluid has-faux-col">
    <div class="row">
	<div class="col-md-2 faux-col"></div>
	<div class="col-md-2 sidebar">
	    <ul class="nav nav-pills nav-stacked">
		<li><a href="{{ URL::to('admin') }}">Dashboard</a></li>
		<li><a href="{{ URL::to('admin/auctions') }}">Auctions</a></li>
		<li><a href="{{ URL::to('admin/portfolio') }}">Portfolio</a></li>
		<li><a href="{{ URL::to('admin/analytics') }}">Analytics</a></li>
	    </ul>
	</div>
	<div class="col-md-10">
	    @yield('inner_content')
	</div>
    </div>
</div>
@stop