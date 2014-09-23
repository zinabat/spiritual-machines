<?php

class ArtworksController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /artworks
     *
     * @return Response
     */
    public function index()
    {
	return View::make('portfolio');
    }

    /**
     * Display the specified resource.
     * GET /artworks/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
	    //
    }

}