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
	return View::make('admin/portfolio')->with('artworks', $this->artwork->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     * GET /admin/artworks/create
     *
     * @return Response
     */
    public function create()
    {
	return View::make('admin/artwork-create')->with('mode', 'create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin/artworks
     *
     * @return Response
     */
    public function store($msg = 'Artwork has been added.')
    {
	$this->artwork->success = $msg;
	//fill the artwork object and sanitize.
	$this->artwork->fill( Input::all() );
	
	//handle images
	if(Input::hasFile('imageFile')){
	    $this->artwork->imageFile = Input::file('imageFile');
	}
	
	if( $this->artwork->isValid() ){
	    $this->artwork->createThumbnails();
	    $this->artwork->save();
	    return Redirect::to('admin/artworks/' . $this->artwork->id . '/edit')->withSuccess($this->artwork->success);
	}
	
	return Redirect::back()->withInput()->withErrors( $this->artwork->errors );
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
	return View::make('admin/artwork-create')->with('artwork', $this->artwork->find($id) )->with('mode', 'edit');
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
	$this->artwork = $this->artwork->find($id);
	return $this->store('Artwork has been updated.');
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
	$this->artwork->destroy($id);
	return Redirect::to('admin/artworks')->withSuccess('Artwork deleted.');
    }

}