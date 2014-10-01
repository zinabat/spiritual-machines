<?php

class SessionsController extends BaseController {
    
    protected $user;
    
    public function __construct(User $user) {
	$this->user = $user;
    }
    
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
	
	if( $this->user->credentialsAreValid($input) ){
	    if( Auth::attempt(array(
		'username' => $input['username'], 
		'password' => $input['password']
	    )) ){
		return Redirect::to('admin/dashboard');
	    }
	    //If the credentials are valid, but authentication fails anyway, the password must be wrong.
	    $this->user->errors = "Login incorrect.";
	}

	return Redirect::to('login')->withInput()->withErrors( $this->user->errors );
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
