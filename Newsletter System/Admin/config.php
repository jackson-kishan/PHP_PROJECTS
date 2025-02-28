<?php

session_start();
require_once 'database.php';

$mini = false;
$nonav = false;

error_reporting(0);

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_Name','newsletter');

$db = new Database(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if($db){
  echo "connected";
} else {
  echo "not connected";
}