<?php
Class Session{

	public function __construct(){
		session_start();
	}
	
	public function setdata( $session = array() ){
		if (is_array( $session )){
			foreach ( $session as $sess_name => $sess_data ){
				$_SESSION[$sess_name] = $sess_data;
			}
		}
	}
	
	public function destroy(){
		session_destroy();
	}
	
	public function _unset($session_name){
		unset($_SESSION[$session_name]);
	}
}
?>