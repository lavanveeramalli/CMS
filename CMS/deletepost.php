
<?php require_once("session.php") ;?>
<?php


$id = $_GET['id'];
 
$Connection=mysqli_connect('localhost','root','','cms');
$result = mysqli_query($Connection, "DELETE FROM tablepanel WHERE id=$id");
if($result){
$_SESSION["successmessage"]="Post added successfully";
header("Location:simple.php");
}else{
	$_SESSION["Errormessage"]="Something went wroung. try again";
	header("Location:simple.php");
}
?>