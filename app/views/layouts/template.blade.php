<!doctype html>
<html>
    <head>
	{{ HTML::style('css/bootstrap.min.css') }}
	@yield('style')
    </head>
    <body>
	@yield('content')
	
	{{ HTML::script('js/jquery-1.11.1.min.js')}}
	{{ HTML::script('js/bootstrap.min.js')}}
	@yield('scripts')
    </body>
</html>