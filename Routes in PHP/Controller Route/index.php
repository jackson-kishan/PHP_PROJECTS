<?php

require_once "base.php";
require_once "userController.php";

Route::get('/user', [UserController::class, 'index']);

Route::dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);