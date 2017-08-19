<?php

Class _Controller {
	public function __construct(){
		$this->load = load_class('Loader',CORE_DIR);
		$this->set  = load_class('Set', CORE_DIR);
	}
}
?>