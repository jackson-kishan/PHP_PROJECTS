<!DOCTYPE html> 
<html  > 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title><?php echo $title; ?> » My Newsletter App</title> 
        <!-- Stylesheets --> 
        <!-- <link rel="stylesheet" href="media/style.css" type="text/css" media="all" /> --> 
    </head> 
    <body<?php if ($mini == true) { ?> class="mini"<?php } ?>> 
        <div id="header"> 
            <h1><a href="index.php">My Newsletter App</a></h1> 
        </div> 
        <?php if ($nonav == false) { ?> 
            <div id="nav"> 
                <a href="messages.php"<?php if($tab == 'mess') {?>class="current"<?php } ?>>messages</a> 
                <a href="subscribers.php"<?php if($tab == 'sub') {?>class="current"<?php } ?>>subscribers</a> 
                <a href="newsletters.php"<?php if($tab == 'nl') {?>class="current"<?php } ?>>newsletters</a> 
                <a href="templates.php"<?php if($tab == 'temp') {?>class="current"<?php } ?>>templates</a> 
                <span class="right"> 
                    <a href="logout.php">log out</a> 
                </span> 
            </div> 
        <?php } ?> 
        <div id="container"> 
            <h3><?php echo $title;?></h3> 
            <?php echo $content; ?> 
        </div> 
    </body> 
</html>