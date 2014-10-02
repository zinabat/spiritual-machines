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
     * unless you want random things to break.
	public $id;
	public $title;
	public $description;
	public $sold_price;
	public $auction_link;
	public $thumbnail_path;
	public $date_created;
	public $created_at;
	public $updated_at;
     */
    
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
	$this->thumbnail->target = array(
	    'width' => 300,
	    'ratio' => '16:9',
	    'imageName' => $this->generateNameFromTitle()
	);
	$this->thumbnail->create( $this->imageFile );
	$this->thumbnail_path = $this->thumbnail->localPath;
    }
    
    public function generateNameFromTitle(){
	return strtolower( substr(preg_replace('/[^A-Za-z0-9]/', '', $this->title ), 0, 12 ) . str_random(8) );
    }
    
    public function getThumbnail($size = ''){
	if(empty($size)) return HTML::image($this->thumbnail_path);
	
	return HTML::image(str_replace('.', '_'.$size.'.', $this->thumbnail_path));
    }
    
    /**
     * Accessors
     */
    public function getDateCreatedAttribute($value){
	if($value == '0000-00-00' || !$value) return '';

	$date = DateTime::createFromFormat('Y-m-d', $value);
	return $date->format(Config::get('display.date_format'));
    }
    
    public function getCreatedAtAttribute($value){
	$date = new DateTime($value);
	return $date->format(Config::get('display.date_format'));
    }
    
    public function getSoldPriceAttribute($value){
	if($value === '0') return '';
	return $value;
    }
    
    /**
     * Mutators
     * These are being used instead of my usual sanitizeAndFill function to avoid
     * issues with accessors and empty inputs. Also it's probably better to do things
     * this way.
     */
    public function setTitleAttribute($value){
	$this->attributes['title'] = e(trim($value));
    }
    
    public function setDescriptionAttribute($value){
	$this->attributes['description'] = e($value);
    }
    
    public function setSoldPriceAttribute($value){
	$this->attributes['sold_price'] = (int) trim($value);
    }
    
    public function setAuctionLinkAttribute($value){
	$this->attributes['auction_link'] = trim($value);
    }
    
    public function setDateCreatedAttribute($value){
	$this->attributes['date_created'] = date('Y-m-d', strtotime( $value ));
    }
}