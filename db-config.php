<?php if ( ! defined('ACCESS') ) die("Direct access not allowed.");


/** MySQL database name */
define('DB_NAME', 'db_calumpang');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** MySQL PDO Connection */
try {

    $DB = new PDO('mysql:dbname='.DB_NAME. ';host='.DB_HOST, DB_USER, DB_PASSWORD);

    // set the PDO error mode to exception
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    die(":Database Connection Failed:" . $e->getMessage());

}