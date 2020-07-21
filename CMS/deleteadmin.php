<?php require_once("session.php") ;?>
<?php


$id = $_GET['id'];
 
$Connection=mysqli_connect('localhost','root','','cms');
$result = mysqli_query($Connection, "DELETE FROM registration WHERE id=$id");
if($result){
$_SESSION["successmessage"]="admin deleted successfully";
header("Location:admin.php");
}else{
	$_SESSION["Errormessage"]="Something went wroung. try again";
	header("Location:admin.php");
}
?>