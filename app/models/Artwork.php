<?php

class Artwork extends \Eloquent {
    protected $fillable = ['title', 'description', 'sold_price', 'auction_link', 'date_created'];
    protected $thumbnail;
    
    public static $rules = array(
	'title' => 'required|max:255',
	'description' => 'max:255',
	'sold_price' => 'integer',
	'auction_link' => 'url',
	'imageFile' => 'image|max:35000' //not a column
    );
    
    public $errors;
    public $success;
    public $imageFile;
    public $old_thumbnail_path;
    public $thumbnail_sizes = array(300, 900);
    
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
    
    public function hasThumbnail(){
	if(empty($this->thumbnail_path)) return false;
	return true;
    }
    
    public function createThumbnails(){
	if(is_null( $this->imageFile )) return false;
	
	$this->thumbnail = App::make('Thumbnail');
	$this->thumbnail->target = array(
	    'width' => $this->thumbnail_sizes,
	    'height' => null,
	    'ratio' => '16:9',
	    'imageName' => $this->generateNameFromTitle()
	);
	$success = $this->thumbnail->create( $this->imageFile );
	
	//is there already a thumbnail?
	if($this->hasThumbnail() && $success){ 
	    $this->old_thumbnail_path = $this->thumbnail_path;
	    $this->deleteThumbnails();
	}
	
	$this->thumbnail_path = $this->thumbnail->localPath;
    }
    
    public function deleteThumbnails(){
	$path = asset($this->old_thumbnail_path);
	if( file_exists($path) ){
	    unlink($path);
	    foreach($this->thumbnail_sizes as $size){
		$this_size = str_replace('.', '_'.$size.'.', $path);
		if( file_exists($this_size) )
		    unlink($this_size);
	    }
	}
    }
    
    public function generateNameFromTitle(){
	return strtolower( substr(preg_replace('/[^A-Za-z0-9]/', '', $this->title ), 0, 12 ) . str_random(8) );
    }
    
    public function getThumbnail($size = ''){
	if(empty($size)) return HTML::image($this->thumbnail_path);
	
	return HTML::image(str_replace('.', '_'.$size.'.', $this->thumbnail_path));
    }
    
    public function isActive(){
	return (empty($this->sold_price) && !empty($this->auction_link));
    }
    
    public function getEbayPrice(){
	//
    }
    
    /*
     * Scopes
     * Yay for re-using query logic.
     */
    public function scopeActive($query)
    {
        return $query->where('sold_price', '=', 0)->where('auction_link', '!=', '');
    }
    
    public function scopeInactive($query)
    {
        return $query->where('sold_price', '>', 0);
    }
    
    public function scopeSummary($query)
    {
        return $query->select('id', 'title', 'created_at', 'date_created', 'thumbnail_path', 'auction_link', 'sold_price');
    }
    
    /**
     * Accessors
     * 
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