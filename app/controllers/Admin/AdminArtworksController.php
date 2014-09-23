<?php

class AdminArtworksController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /artworks
     *
     * @return Response
     */
    public function index()
    {
	return View::make('admin/portfolio');
    }

    /**
     * Show the form for creating a new resource.
     * GET /artworks/create
     *
     * @return Response
     */
    public function create()
    {
	return View::make('admin/artwork-create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /artworks
     *
     * @return Response
     */
    public function store()
    {
	    //
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

    /**
     * Show the form for editing the specified resource.
     * GET /artworks/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
	    //
    }

    /**
     * Update the specified resource in storage.
     * PUT /artworks/{id}
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
     * DELETE /artworks/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
	    //
    }

}