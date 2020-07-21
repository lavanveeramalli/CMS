<?php require_once("session.php"); ?>

<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$admin=$_SESSION['user'];
	$Connection=mysqli_connect('localhost','root','','cms');
	$Query="update comments set status='ON', approvedby='$admin' where id='$id'";
     $Execute=mysqli_query($Connection,$Query);
	 if($Execute){
		 $_SESSION["successmessage"]="comment approved successfully";
		 header("Location:comments.php");
	 }
	 else{
		 $_SESSION["Errormessage"]="comment not approved";
		 header("Location:comments.php");
	 }
}
?>