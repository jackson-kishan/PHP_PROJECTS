<?php

require_once "base.php";

Route::get('/home', function(){
   echo "Hello from Home";
});

Route::dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);