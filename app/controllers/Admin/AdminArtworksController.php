<?php

class AdminArtworksController extends \BaseController {
    
    protected $artwork;
    
    public function __construct(Artwork $artwork) {
	/*
	 * Use dependency injections for any required custom classes.
	 */
	$this->artwork = $artwork;
    }
    
    /**
     * Display a listing of the resource.
     * GET /admin/artworks
     *
     * @return Response
     */
    public function index()
    {
	return View::make('admin/portfolio');
    }

    /**
     * Show the form for creating a new resource.
     * GET /admin/artworks/create
     *
     * @return Response
     */
    public function create()
    {
	return View::make('admin/artwork-create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin/artworks
     *
     * @return Response
     */
    public function store()
    {
	//fill the artwork object and sanitize.
	$this->artwork->fill( Input::all() )->sanitize();
	
	//handle images
	if(Input::hasFile('imageFile')){
	    $this->artwork->imageFile = Input::file('imageFile');
	}
	
	
	if( $this->artwork->isValid() ){
	    $this->artwork->createThumbnails();
	    $this->artwork->save();
	    return Redirect::to('admin/artworks/' . $this->artwork->id . '/edit')->withSuccess('Artwork has been added.');
	}
	
	return Redirect::back()->withInput()->withErrors( $this->artwork->errors );
    }

    /**
     * Display the specified resource.
     * GET /admin/artworks/{id}
     *
     * @param  object $artwork
     * @return Response
     */
    public function show($artwork)
    {
	//
    }

    /**
     * Show the form for editing the specified resource.
     * GET /admin/artworks/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
	return View::make('admin/artwork-create')->with('artwork', $this->artwork->find($id) );
    }

    /**
     * Update the specified resource in storage.
     * PUT /admin/artworks/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
	    //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /admin/artworks/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
	    //
    }

}