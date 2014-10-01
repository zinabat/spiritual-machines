<?php

class Artwork extends \Eloquent {
    protected $fillable = ['title', 'description', 'sold_price', 'auction_link', 'date_created'];
    protected $thumbnail;
    
    public static $rules = array(
	'title' => 'required|max:255',
	'description' => 'max:255',
	'sold_price' => 'integer',
	'auction_link' => 'url',
	'thumbnail_path' => 'artwork/default.jpg',
	'imageFile' => 'image|max:35000' //not a column
    );
    
    public $errors;
    public $imageFile;
    
    /**
     * The attributes associated with database columns. Leaves these guys commented 
     * unless you want random things to break. Laravel will set them to null values 
     * when loading Views that contain a model object.
	public $id;
	public $title;
	public $description;
	public $sold_price;
	public $auction_link;
	public $thumbnail;
	public $date_created;
	public $created_at;
	public $updated_at;
     */
    
    /**
     * Sanitize object properties.
     * 
     * @return array
     */
    public function sanitize(){
	$this->title = e(trim( $this->title ));
	$this->description = e( $this->description );
	$this->sold_price = trim( $this->sold_price );
	$this->auction_link = trim( $this->auction_link );
	$this->date_created = date('F j, Y', strtotime( $this->date_created ));
    }
    
    public function isValid(){
	//Check this object against its rule set.
	$validation = Validator::make($this->toArray(), self::$rules);
	
	if($validation->passes()) return true;
	
	$this->errors = $validation->messages();
	return false;
    }
    
    public function createThumbnails(){
	if(is_null( $this->imageFile )) return false;
	
	$this->thumbnail = App::make('Thumbnail');
	//create thumbnails from the supplied image.
	$this->thumbnail->target = array(
	    'width' => 300,
	    'ratio' => '16:9',
	    'imageName' => $this->generateNameFromTitle()
	);
	$this->thumbnail->create( $this->imageFile );
    }
    
    public function generateNameFromTitle(){
	return strtolower( substr(preg_replace('/[^A-Za-z0-9]/', '', $this->title ), 0, 12 ) . str_random(8) );
    }
}