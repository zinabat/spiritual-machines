<!doctype html>
<html>
    <head>
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/font-awesome.min.css') }}
	@yield('styles')
    </head>
    <body>
	@yield('header')
	
	@yield('content')
	
	@yield('footer')
	
	{{ HTML::script('js/jquery-1.11.1.min.js')}}
	{{ HTML::script('js/bootstrap.min.js')}}
	@yield('scripts')
    </body>
</html>