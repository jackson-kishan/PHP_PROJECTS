<?php

require_once 'config.php';

if($db->loggedIn()){
  header('Location: index.php');
}

$title = "login";
$nonav = true;
$mini = true;

if($_POST && (!empty(['username']) && !empty(['password']))) {
  $response = $db->validateUser($_POST['username'], $_POST['password']);

  if(!$response) {
    header('Location: login.php');
    exit;
  }

  $error = $_SESSION['error'];
  $content = '';
  $content .= $error;
  $content .= '
  <form action="login.php" method="post">
  <p>
    <label for="username">Username</label><br />
    <input type="text" name="username" id="username">
  </p>
  <p>
   <label for="password">Password:</label><br />
   <input type="password" name="password" id="password">
  </p>
  <p>
    <input type="submit" value="login">
  </p>
  </form>
  ';

  include 'layout.php';
}