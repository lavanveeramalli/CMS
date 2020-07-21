<?php require_once("session.php") ;?>
<?php
$_SESSION['users']=null;
session_destroy();
header("Location:loginpage.php");
?>