<?php 



 require_once  'config.php';

    $start = 0;
    $per_page = 4;
    $page_counter = 0;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;

   
    if(isset($_GET['start'])){
        $start = $_GET['start'];
        $page_counter = $_GET['start'];
        $start = $start * $per_page;
        $next = $page_counter + 1;
        $previous = $page_counter - 1;
    }

    //query to get messages from messages table
    $q = "SELECT * FROM students LIMIT $start, $per_page";
    $query = $db->prepare($q);
    $query->execute();

    if($query->rowCount() > 0) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //Count total number of rows in the students table
    $count_query = "SELECT * FROM students";
    $query = $db->prepare($count_query);
    $query->execute();
    $count = $query->rowCount();
    //Calculate the pagination number by dividing the total number of row with per page
    $pagination = ceil($count / $per_page);



?>