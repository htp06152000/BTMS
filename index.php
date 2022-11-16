<?php
		
    session_start();

    define('ACCESS', true);
	
    include_once 'db-config.php';
    include_once 'functions.php';
    
    if( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] != "" ) {
            
		// Convert url params into array
		$url_array = explode('/', $_GET['page']);
	
		// Get length or url params
		$url_array_length = count($url_array);
	
		// Check if url is valid
		if ($url_array_length > 1) {
			error_404();
		} else {
			load_page( strtolower($_GET[ 'page' ]) );
		}
	
	} else {
	
		load_page("home");
	
	}	
    
?> 