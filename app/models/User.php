<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * The attributes associated with database columns.

    public $id;
    public $username;
    public $password;
    public $email;
    public $created_at;
    public $updated_at;
     * 
     */
    
    public $errors;
    
    /**
     * Validate login credentials so we can return useful errors.
     * 
     * @param array $input
     */
    public function credentialsAreValid($input){
	$validation = Validator::make($input, array(
	    'username' => 'required|exists:users',
	    'password' => 'required'
	));
	
	if($validation->passes()) return true;
	
	$this->errors = $validation->messages();
	return false;
    }

}
