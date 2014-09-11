@extends('layouts.basic')

@section('inner_content')
<h1>Contact</h1>
<p>If you have any questions or concerns about my work, or if you'd like to ask about commissioned pieces, fill out the form below or call.</p>
{{ Form::open() }}
    <div class="form-group">
	{{ Form::label('email', 'Your Email') }}
	{{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
	{{ Form::label('message') }}
	{{ Form::textarea('message', null, array('class' => 'form-control')) }}
    </div>
    
    {{ Form::submit('send', array('class' => 'btn btn-primary btn-lg')) }}
{{ Form::close() }}
@stop