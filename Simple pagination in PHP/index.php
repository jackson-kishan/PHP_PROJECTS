<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Pagination Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

    <?php include_once 'data.php'; ?>

    <div class='table-responsive' style="width:600px; border:1px solid black; margin: 10px">

     <table class="table table-striped table-hover">
        <thead class="table-info">
            <th scope="col" class="bg-primary">Id</th>
            <th scope="col" class="bg-primary">First Name</th>
            <th scope="col" class="bg-primary">Last Name</th>
            <th scope="col" class="bg-primary">Email</th>
        </thead>
        <tbody>
            <?php
            foreach($result as $data){
                echo "<tr>";
                echo "<td>" . $data[ 'id' ] . "</td>";
                echo "<td>" . $data[ 'first_name' ] . "</td>";
                echo "<td>" . $data[ 'last_name' ] . "</td>";
                echo "<td>" . $data[ 'email' ] . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
     </table>
     <ul class='pagination'>
       
         <?php
            if($page_counter == 0){
                echo "<li> <a href=?start='0' class='active'>0</a></li>";

                for($i = 1; $i < $pagination; $i++){
                    echo "<li> <a href=?start=$i>" . $i . "</a></li>";
                }
            }else {
                echo "<li><a href=?start=$previous>Previous</a></li>";

                for($i = 0; $i < $pagination; $i++){
                    if($i == $page_counter){
                       echo "<li> <a href=?start=$i class='active'>" . $i . "</a></li>"; 
                    }else {
                        echo "<li> <a href=?start=$i>" . $i . "</a></li>";
                    }
                }
            }if($i == $page_counter +1){
                echo "<li> <a href=?start=$next>Next</a></li>";
            }
         ?>
     </ul>

    </div>
    
</body>
</html>