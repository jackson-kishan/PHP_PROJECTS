<?php

namespace Admin;
session_start();
use Admin\Database;


$mini = false;
$nonav = false;

error_reporting(0);

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_Name','newsletter_project');

$db = new Database(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);