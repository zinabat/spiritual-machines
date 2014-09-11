@extends('layouts.basic')

@section('inner_content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
    {{ Form::open() }}
	<div class="form-group">
	    {{ Form::label('username') }}
	    {{ Form::text('username', null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
	    {{ Form::label('password') }}
	    {{ Form::text('password', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('login', array('class' => 'btn btn-primary btn-lg')) }}
    {{ Form::close() }}
    </div>
</div>
@stop