<?php

namespace Libraries;

use \Image;

class Thumbnail extends Upload {

    protected $original;
    protected $imageLib;
    public $target = array(
	'height' => null,
	'width' => null,
	'ratio' => null,
	'imageName' => '',
	'path' => ''
    );

    public function __construct() {
	$this->uploadFolder = public_path() . '/artwork';
    }

    public function cropFromCenter($imageObject) {
	$x = 0;
	$y = 0;
	if ($this->target['width'] < $this->original->width()) {
	    //half of the difference between the widths is the distance to crop lengthwise.
	    $x = (int) ceil(($this->original->width() - $this->target['width']) / 2);
	}
	if ($this->target['height'] < $this->original->height()){
	    //half of the difference between the heights is the distance to crop heightwise.
	    $y = (int) ceil(($this->original->height() - $this->target['height']) / 2);
	}
	
	return $imageObject->crop($this->target['width'], $this->target['height'], $x, $y);
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

	if ( !is_null($this->target['ratio']) ) $this->setTargetRatio();

	$this->original = Image::make( $this->file->getRealPath() );
	$this->original->ratio = $this->original->width() / $this->original->height();
	$this->setTargetPath();

	/* If the image ratio is different than the target, we need to calculate which dimension to resize by.
	 * Then we have to crop it from the center.
	 */
	if ($this->original->ratio != $this->target['ratio']) {
	    $newImage = $this->resizeProportionally();
	    $this->cropFromCenter($newImage);
	} else {
	    $newImage = $this->original->resize($this->target['width'], null, function($constraint){
		$constraint->aspectRatio();
	    });
	}
	dd($this->target['path']);
	$newImage->save( $this->target['path'] );
    }

    public function resizeProportionally() {
	//if the ratio between the width and height is smaller than the wanted ratio
	if (($this->original->ratio) < ($this->target['ratio'])) {
	    //then shrink the width and preserve the aspect ratio
	    return $this->original->resize($this->target['width'], null, function($constraint){
		$constraint->aspectRatio();
	    });
	}
	return $this->original->resize(null, $this->target['height'], function($constraint){
		$constraint->aspectRatio();
	    });
    }

    public function setTargetRatio() {
	$ints = explode(":", $this->target['ratio'] );
	$this->target['ratio'] = (int) $ints[0] / (int) $ints[1];
	$this->setTargetDimensions();
    }
    
    public function setTargetDimensions(){
	if( is_null($this->target['width']) ){
	    $this->target['width'] = (int) ceil($this->target['ratio'] * $this->target['height']);
	} else {
	    $this->target['height'] = (int) ceil($this->target['width'] / $this->target['ratio']);
	}
    }
    
    public function setTargetPath(){
	$this->target['path'] = sprintf('%s_%s.%s', $this->uploadFolder . $this->target['imageName'], $this->target['width'], $this->file->getClientOriginalExtension());
    }

}
