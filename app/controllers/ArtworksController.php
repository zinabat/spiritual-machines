<?php

class ArtworksController extends \BaseController {

    protected $artwork;
    
    public function __construct(Artwork $artwork) {
	/*
	 * Use dependency injections for any required custom classes.
	 */
	$this->artwork = $artwork;
    }
    
    /**
     * Display a listing of the resource.
     * GET /artworks
     *
     * @return Response
     */
    public function index()
    {
	return View::make('portfolio')->with('artworks', $this->artwork->summary()->inactive()->get());
    }

    /**
     * Display the specified resource.
     * GET /artworks/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id='')
    {
	if(empty($id)){
	    $artwork = $this->artwork->inactive()->first();
	} else {
	    $artwork = $this->artwork->find($id);
	    if(!$artwork) App::abort(404);
	}
	 return View::make('single')->with('artwork', $artwork);
    }

}