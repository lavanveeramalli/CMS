<?php require_once("session.php"); ?>

<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$Connection=mysqli_connect('localhost','root','','cms');
	$Query="delete from category where id='$id'";
     $Execute=mysqli_query($Connection,$Query);
	 if($Execute){
		 $_SESSION["successmessage"]="Deleted Successfully";
		 header("Location:Categories.php");
	 }
	 else{
		 $_SESSION["Errormessage"]="Deleted unSuccessfully";
		 header("Location:Categories.php");
	 }
}
?>