<?php

namespace Libraries;

use \Image;

class Thumbnail extends Upload {

    protected $original;
    protected $largestImage;
    protected $imageLib;
    public $localPath = '/artwork';
    public $calcedTarget = array();
    public $target = array(
	'height' => null,
	'width' => null,
	'ratio' => null,
	'imageName' => '',
	'path' => ''
    );

    public function __construct() {
	$this->uploadFolder = public_path() . $this->localPath;
    }

    public function cropFromCenter($imageObject) {
	$x = 0;
	$y = 0;
	if ($this->calcedTarget['width'] < $this->original->width()) {
	    //half of the difference between the widths is the distance to crop lengthwise.
	    $x = (int) ceil(($this->original->width() - $this->calcedTarget['width']) / 2);
	}
	if ($this->calcedTarget['height'] < $this->original->height()){
	    //half of the difference between the heights is the distance to crop heightwise.
	    $y = (int) ceil(($this->original->height() - $this->calcedTarget['height']) / 2);
	}
	
	return $imageObject->crop($this->calcedTarget['width'], $this->calcedTarget['height'], $x, $y);
    }

    /**
     * 
     * @param file $file
     * @param array $sizes
     * @return boolean
     */
    public function create($file) {
	if (!$this->isValidFileSize()) return false;

	$this->file = $file;
	$this->uploadFolder = $this->makeFolders();

	$this->setTargetPath();
	$this->saveOriginal();
	$this->createLargestSize();
	$this->createOtherSizes();
	
	return true;
    }
    
    public function createLargestSize(){
	$this->calcedTarget = $this->getLargestTargetSize();
	
	if ( !is_null($this->target['ratio']) ) $this->setTargetRatio();
	
	/* If the image ratio is different than the target, we need to calculate which dimension to resize by.
	 * Then we have to crop it from the center.
	 */
	if ($this->original->ratio != $this->target['ratio']) {
	    $this->setTargetDimensions();
	    $this->largestImage = $this->resizeProportionally($this->calcedTarget);
	    $this->cropFromCenter($this->largestImage);
	} else {
	    $this->largestImage = $this->original->resize($this->calcedTarget['width'], null, function($constraint){
		$constraint->aspectRatio();
	    });
	}
	$this->largestImage->save( $this->getPathWithSuffix($this->calcedTarget['width']) );
    }
    
    public function createOtherSizes(){
	if(!is_array($this->target['width']) || empty($this->target['width'])) return;
	
	foreach($this->target['width'] as $width){
	    $this->largestImage
		    ->resize($width, null, function($constraint){
			$constraint->aspectRatio();
		    })
		    ->save( $this->getPathWithSuffix($width) );
	}
    }
    
    public function getPathWithSuffix($string){
	return str_replace('.', '_'.$string.'.', $this->target['path']);
    }
    
    public function getLargestTargetSize(){
	$target = array();
	foreach( array('width', 'height') as $dimen){
	    if(is_array($this->target[$dimen])){
		arsort($this->target[$dimen]);
		$target[$dimen] = array_shift( $this->target[$dimen] );
	    } else {
		$target[$dimen] = $this->target[$dimen];
	    }
	}
	return $target;
    }

    public function resizeProportionally( $target ) {
	//if the ratio between the width and height is smaller than the wanted ratio
	if ($this->original->ratio < $target['ratio']) {
	    //then shrink the width and preserve the aspect ratio
	    return $this->original->resize($target['width'], null, function($constraint){
		$constraint->aspectRatio();
	    });
	}
	return $this->original->resize(null, $target['height'], function($constraint){
		$constraint->aspectRatio();
	    });
    }

    public function setTargetRatio() {
	$ints = explode(":", $this->target['ratio'] );
	$this->calcedTarget['ratio'] = (int) $ints[0] / (int) $ints[1];
    }
    
    public function setTargetDimensions(){
	if( is_null($this->target['width']) || empty($this->target['width'])){
	    $this->calcedTarget['width'] = (int) ceil($this->calcedTarget['ratio'] * $this->calcedTarget['height']);
	} else {
	    $this->calcedTarget['height'] = (int) ceil($this->calcedTarget['width'] / $this->calcedTarget['ratio']);
	}
    }
    
    public function setTargetPath(){
	$this->target['path'] = sprintf('%s.%s', $this->uploadFolder . $this->target['imageName'], $this->file->getClientOriginalExtension());
	$this->localPath .= $this->target['imageName'] .'.'.$this->file->getClientOriginalExtension();
    }
    
    public function saveOriginal(){
	$this->original = Image::make( $this->file->getRealPath() );
	$this->original->ratio = $this->original->width() / $this->original->height();
	
	if($this->original->width() > 1000 || $this->original->height() > 1000){
	    $this->resizeProportionally(array('ratio' => 1, 'width' => 1000, 'height' => 1000));
	}
	$this->original->save($this->target['path']);
	
    }

}