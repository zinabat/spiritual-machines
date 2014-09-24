@extends('layouts.admin')

@section('inner_content')
<h1>Add a Piece</h1>
<a href="{{ URL::to('admin/artworks') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back to Artwork</a>
<br><br>

@if( Route::currentRouteName() == 'admin.artworks.create' )
{{ Form::open(array('route' =>  'admin.artworks.store') ) }}
@else
{{ Form::model($artwork, array('route' =>  array('admin.artworks.update', $artwork->id), 'method' => 'put') ) }}
@endif

@if($errors->has())
    <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
	{{ $error }}<br>
    @endforeach
    </div>
@endif

<div class="form-group">
    {{ Form::label('title') }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('ebay_link', 'Is this item currently being auctioned?') }}
    <div class="input-group">
	<span class="input-group-btn">
	    <button class="btn btn-default" type="button" data-toggle="auction" data-target="ebay_link">Yes</button>
	</span>
	{{ Form::text('ebay_link', null, array('class' => 'form-control form-auction', 'placeholder' => 'http://', 'disabled' => true)) }}
    </div>
    <span class="help-block">
	Link to eBay auction page. <a href="#" title="click for help"><i class="fa fa-question-circle"></i></a>
    </span>
</div>
<div class="form-group">
    <div class="input-group">
	<span class="input-group-btn">
	    <button class="btn btn-default" type="button" data-toggle="auction" data-target="sold_price">No</button>
	    <button class="btn btn-default" type="button" disabled>$</button>
	</span>
	{{ Form::text('sold_price', null, array('class' => 'form-control form-auction', 'disabled' => true, 'id' => 'sold_price')) }}
    </div>
    <span class="help-block">
	How much the piece was sold for. <a href="#" title="click for help"><i class="fa fa-question-circle"></i></a>
    </span>
</div>
<div class="form-group">
    {{ Form::label('thumbnail') }}
    {{ Form::file('thumbnail', array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('date_created', 'Date Created') }}
    {{ Form::text('date_created', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('description') }}
    {{ Form::textarea('description', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::submit('Add Piece', array('class' => 'btn btn-primary btn-lg')) }}
</div>
{{ Form::close() }}
@stop

@section('scripts')
<script>
var toggleActiveAuction = function(){
    if( $(this).hasClass('active') ){
	return false;
    }
    $('[data-toggle="auction"]').removeClass('active');
    $('.form-auction').prop('disabled', true);
    
    $(this).addClass('active');
    $('#' + $(this).data('target') ).prop('disabled', false).focus();
};

$(document).ready(function(){
    $('[data-toggle="auction"]').click(toggleActiveAuction);
});
</script>
@stop