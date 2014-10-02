<?php

namespace Libraries;

class Upload {
    public $errors;
    public $file;
    public $localPath = '';
    protected $uploadFolder;
    
    public function makeFolders(){
	$hash = $this->makeHash();
	$fullPath = $this->uploadFolder;
		
	foreach($hash as $folder){
	    $fullPath.= '/' . $folder;
	    if(!is_dir( $fullPath )) mkdir( $fullPath );
	}
	$this->localPath .= '/' . implode('/', $hash) . '/';
	return $fullPath . '/';
    }
    
    public function makeHash(){
	$hash = md5($this->file->getClientOriginalName());
	return array( substr($hash, 0, 1), substr($hash, 1, 2) );
    }
    
    //catch upload size exception. I stole this from someone.
    public function isValidFileSize(){
	if(empty($_FILES) && empty($_POST)){
	    $file_max = ini_get('upload_max_filesize');
	    $file_max_str_leng = strlen($file_max);
	    $file_max_meassure_unit = substr($file_max,$file_max_str_leng - 1,1);
	    $file_max_meassure_unit = $file_max_meassure_unit == 'K' ? 'kb' : 
		    ($file_max_meassure_unit == 'M' ? 'mb' : 
			    ($file_max_meassure_unit == 'G' ? 'gb' : 'unidades'));
	    $file_max = substr($file_max,0,$file_max_str_leng - 1);
	    $file_max = intval($file_max);

	    $this->errors = sprintf('The file size should be lower than %s%s.', $file_max, $file_max_meassure_unit);

	    return false;
	}
	return true;
    }
}
