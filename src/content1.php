<?php
session_start();
if($_SERVER['HTTP_REFERER' ]!= 'http://localhost/login.php'){
    header('Location: /login.php');
    exit();
}


if(!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
  }

$_SESSION['visits']++;	
if(!is_null ($_POST['userName']) && $_POST['userName']!= "") {
	echo "Hello $_POST[userName] you have visited 
	this page $_SESSION[visits] times before. Click <a href = 'login.php'>here</a> 
	to logout";
	echo"<a href = 'content2.php'>Content 2</a>";

}
else {echo "A username must be entered. 
	Click <a href = 'login.php' session_destroy()>here</a> 
	to return to the login screen.";
	echo"<br>";
}
?>