<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");

// function to get the path of the directory
function root_url( $url = "" ) {
    $folder = dirname( $_SERVER[ 'PHP_SELF' ] );
    $port = isset( $_SERVER[ 'SERVER_PORT' ] ) && ! empty( $_SERVER[ 'SERVER_PORT' ] ) ? ':' . $_SERVER[ 'SERVER_PORT' ] : '';
    $protocol = isset( $_SERVER[ 'HTTPS' ] ) ? $_SERVER[ 'HTTPS' ] : 'http://';
	return $protocol . $_SERVER[ 'SERVER_NAME' ] . $port . $folder . '/' . $url;		
}

// function to redirect to homepage
function redirect_to( $url = "" ) {
	header( "Location:" . root_url( $url ) );
	exit();
}

// function to redirect back to previous page
function redirect_back() {
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit();
}

// function to load a php file - controller
function load_page( $page ) {

	if( $page == "logout" ) {
        session_unset();
		session_destroy();
    	redirect_to('login');
    } else if( file_exists( "./pages/$page.php" ) ){
		global $DB;
		if( file_exists( "./actions/$page-action.php" ) ) {
			include_once "./actions/$page-action.php";
		}
		$pagetitle = $page;
		include_once "./layout/header.php";
		include_once "./pages/$page.php";
	} else {
		$pagetitle = "Page not found!";
		include_once "./layout/header.php";
		error_404();
	}
	include_once "./layout/footer.php";
}

// function to get 404 page
function error_404() {
	if( file_exists( "./pages/404.php" ) ) {
		require_once './pages/404.php';
	} else {
		echo "Error 404. File not found.";
	}
}

// function to check if user is logged in
function user_is_loggedin() {
	return (isset( $_SESSION['user_info']) && $_SESSION["user_info"]["id"] != "");
}

// function to get avatar (return placeholder if none)
function get_image( $image_path ) {
	if( file_exists( $image_path ) ){
		return $image_path;
	} else {
		return "./resources/images/placeholder.png";
	}
}

// function to sanitize inputs
function sanitize_input($inp){
	$inp = trim($inp);
	$inp = stripslashes($inp);
	$inp = htmlspecialchars($inp);
	return $inp;
}
