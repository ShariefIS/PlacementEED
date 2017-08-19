<?php


Class Router{
	#load URI
	public function __construct(){
		$this->uri = load_class('URI', CORE_DIR);
	}
	
	public function urlRoute(){
		return $this->segments = $this->uri->getURI();
	}
	
	public function urlParams(){
	
	}
}
?>