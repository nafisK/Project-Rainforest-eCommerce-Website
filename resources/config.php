<?php

//output buffering - This function will turn output buffering on. While output buffering is active no output
// is sent from the script (other than headers), instead the output is stored in an internal buffer.
ob_start();
session_start();

// defines DS if not null 
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

//making easy to move variables
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");
defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY", __DIR__ . DS . "uploads");

//Setting the database connections
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "ecom_db");

//making connection to database
$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//call all the functions made in the functions file
require_once("functions.php");
require_once("cart.php");
