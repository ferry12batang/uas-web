<?php

use Inc\Auth;
use Inc\DBConnection;
use Inc\Request;

# Import all required files
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/class.db.php';
require_once __DIR__ . '/class.auth.php';
require_once __DIR__ . '/class.xss.php';
require_once __DIR__ . '/class.request.php';
require_once __DIR__ . '/class.validate.php';

# Database Initializaition
# Change with the required credentials
$hostname = 'localhost';    // Ganti sesuai dengan kredensial mysql kamu
$username = 'root';         // Ganti sesuai dengan kredensial mysql kamu
$password = 'cakadi1902';   // Ganti sesuai dengan kredensial mysql kamu
$database = 'db_persewaan'; // Ganti sesuai dengan kredensial mysql kamu

$db      = new DBConnection($hostname, $username, $password, $database);
$dbInit  = $db->getConnection();
$auth    = new Auth($dbInit);
$request = new Request();