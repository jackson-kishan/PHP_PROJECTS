<?php 

 $database = 'pagination_project';
 $hostName = 'localhost';
 $userName = 'root';
 $passwords = '';

  $conn = "mysql:host=$hostName; dbname=$database; charset=UTF8";

   try{
       
    $db = new PDO($conn, $userName, $passwords);

   } catch(PDOException $e) {
     echo $e->getMessage();
   }
 
//  $db = new PDO("mysql:dbname={ $database}; host= {$hostName}; post= {3306}", $userName , $passwords);

//   if(!$db) {
//     echo "OOppss Database connection failed!";
//   }


?>