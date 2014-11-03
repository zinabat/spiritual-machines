@if(isset($artworks) && $artworks->count() > 0)
<div class="row portfolio-thumbs">
    @foreach($artworks as $artwork)
    <div class="col-md-3">
	<a href="{{URL::route('portfolio.show', $artwork->id) }}">
	    <div class="price-tag">${{ $artwork->sold_price }}</div>
	    {{ $artwork->getThumbnail(300) }}
	</a>
    </div>
    @endforeach
</div>
@else
<p>There are no artworks to show! Come back soon for updates.</p>
@endif