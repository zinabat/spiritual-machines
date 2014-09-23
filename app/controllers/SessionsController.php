<?php

class SessionsController extends BaseController {
    
    /**
     * Display a login page.
     * GET /sessions/create
     * 
     * @return Response
     */
    public function create(){
	if(Auth::check()) return Redirect::to('admin/dashboard');
    
	return View::make('admin.login');
    }
    
     /**
     * Create a new session for the user.
     * POST /sessions
     * 
     * @return Response
     */
    public function store(){
	$input = Input::all();
	//run some validation first
	
	if( Auth::attempt(array(
	    'username' => $input['username'], 
	    'password' => $input['password']
	)) ){
	    return Redirect::to('admin/dashboard');
	}

	return Redirect::to('login')->withInput();
    }
    
     /**
     * Log the user out
     * DELETE /sessions/{id}
     * 
     * @return Response
     */
    public function destroy(){
	Auth::logout();
	return Redirect::to('login');
    }
    
}
