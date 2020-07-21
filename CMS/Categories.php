<?php //require_once("connection.php");?>
<?php require_once("session.php") ;?>
<?php

if(!isset($_SESSION['user'])){
	 header("Location:loginpage.php");
	 
}
?>
<?php
if(isset($_POST["submit"])){
	$category=$_POST["category"];
	date_default_timezone_set("Asia/Karachi");
    $currenttime=time();
    $date=strftime("%Y-%m-%d %H:%M:%S",$currenttime);
    echo $date;
	$admin=$_SESSION['user'];
	if(empty($category)){
		$_SESSION["Errormessage"]="All fields must be filled";
		header("Location:categories.php");
		exit;
		
	}else if(strlen($category)>99){
		$_SESSION["Errormessage"]="Too long name";
		header("Location:categories.php");
		exit;
		
	}else{
		$Connection=mysqli_connect('localhost','root','','cms');
		$Query="insert into category(datetime,name,creatername) values('$date','$category','$admin')";
        $Execute=mysqli_query($Connection,$Query);
		if($Execute){
			$_SESSION["successmessage"]="Category added successfully";
		    header("Location:categories.php");
		    exit;
		}else{
			$_SESSION["Errormessage"]="category failed to add";
		    header("Location:categories.php");
		    exit;
		}
	}
}
?>

<!DOCTYPE>
<html>
<head>
     <title>Catagories</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="adminstyle.css">
</head>
<style>
body{
	background-color:#2f4050;
}
h2{
	color:white;
}


</style>
<body>
<div class="row">
     <div class="col-sm-2">
	 <h2>Grains</h2>
	 <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li><a href="simple.php">
				<span class="glyphicon glyphicon-th"></span>&nbsp Dashboard</a></li>
                <li><a href="addnewproduct.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp Add new post</a></li>
				<li class="active" ><a href="Categories.php">
				<span class="glyphicon glyphicon-tags"></span>&nbsp Catagories</a></li>
				<li><a href="admin.php">
				<span class="glyphicon glyphicon-user"></span>&nbsp Manage admin</a></li>
				<li><a href="comments.php">
				<span class="glyphicon glyphicon-comment"></span>&nbsp Comments</a></li>
				<li><a href="logout.php">
				<span class="glyphicon glyphicon-log-out"></span>&nbsp Logout</a></li>
            </ul>


	 
	 </div>
     <div class="col-sm-10">
	 <h1>Manage category </h1>
	 <div><?php echo message(); 
	       echo successmessage(); ?></div>
	 <div>
	 <form action="Categories.php" method="POST">
	 <fieldset>
	        <div class="form-group">
	    <label for="categoryname">Name:</label>
		<input class="form-control" type="text" name="category" id="categoryname" placeholder="Name">
	 </div>
	 <br>
	 <input class="btn btn-success btn-block" type="submit" name="submit" value="Add new category">
	 </fieldset> 
	 <br>
	 </form>
	 </div>
	 <div class="table-responsive">
	 <table class="table table-striped table-hover">
	    <tr>
		<th>sr No</th>
		<th>Date $ Time</th>
		<th>Category Name</th>
		<th>Creator name</th>
		<th>Action</th>
		</tr>
	 <?php 
	    $Connection=mysqli_connect('localhost','root','','cms');
		$Query="select * from category order by datetime desc";
        $Execute=mysqli_query($Connection,$Query);
		$sr=0;
		while($rows=mysqli_fetch_array($Execute)){
			$id=$rows["id"];
			$datetime=$rows["datetime"];
			$name=$rows["name"];
			$creatername=$rows["creatername"];
		    $sr++;
	 ?>
	 <tr>
	     <td><?php echo $sr;?></td>
		 <td><?php echo $datetime;?></td>
		 <td><?php echo $name?></td>
		 <td><?php echo $creatername;?></td>
		 <td><a href="deletecategory.php?id=<?php echo $id;?>" ><span class="btn btn-danger">Delete</span></a></td>
	 </tr>
	 <?php } ?>
	 </table>
	 </div>
	 </div>
</div>
</div>
<div id="footer">
    <hr><p>--All are reserved--</p>
	<p>For more details just contact to:8520949757</p>
	<p>Email:xyz@gmail.com</p>
	<hr>
</div>
</body>
</html>