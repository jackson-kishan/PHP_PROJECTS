<?php

require_once 'config.php';

$response = $db->loginRequired();
if(!$response){
  header('Location: login.php');
  exit;
}

$title = "Newsletters";
$newsletters = $db->query("SELECT * FROM newsletters ORDER BY id ASC");

$tab = 'nl';
$table = '';

foreach($newsletters as $row) {
  $dlink = '<a href="newsltters_delete.php?id="'. $row['id'].'" onclick=" return confirm("Are you sure you want to delete this newsletter?");"
}
