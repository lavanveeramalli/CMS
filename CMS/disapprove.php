<?php require_once("session.php"); ?>

<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$Connection=mysqli_connect('localhost','root','','cms');
	$Query="update comments set status='OFF' where id='$id'";
     $Execute=mysqli_query($Connection,$Query);
	 if($Execute){
		 $_SESSION["successmessage"]="Comment Disapproved Successfully";
		 header("Location:comments.php");
	 }
	 else{
		 $_SESSION["Errormessage"]="Comment not Disapproved";
		 header("Location:comments.php");
	 }
}
?>