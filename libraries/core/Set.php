<?php

Class Set{	
	public function post( $post ){
		if ( !EMPTY($_POST[$post]) ){
			return $_POST[$post];
		}
	}
	
	public function get( $get ) {
		if ( !EMPTY ($get) ){
			return $_GET[$get];
		}
	}
	
}
?>