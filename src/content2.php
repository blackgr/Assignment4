<?php

if($_SERVER['HTTP_REFERER']!= 'http://localhost/content1.php'){
    header('Location: /login.php');
    exit();
}

	
echo"<a href = 'content1.php'>Content 1</a>";

?>