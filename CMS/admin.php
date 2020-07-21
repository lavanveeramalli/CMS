<?php //require_once("connection.php");?>
<?php require_once("session.php") ;?>
<?php
if(!isset($_SESSION['user'])){
	 header("Location:loginpage.php");
	 
}
?>
<?php
if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$confirmpassword=$_POST["confirmpassword"];
	date_default_timezone_set("Asia/Karachi");
    $currenttime=time();
    $date=strftime("%Y-%m-%d %H:%M:%S",$currenttime);
    echo $date;
	$admin=$_SESSION['user'];
	if(empty($username)||empty($password)||empty($confirmpassword)){
		$_SESSION["Errormessage"]="All fields must be filled";
		header("Location:admin.php");
		exit;
		
	}else if(strlen($password)<4){
		$_SESSION["Errormessage"]="Atleast 4 charecters for password are required";
		header("Location:admin.php");
		exit;
		
	}else if($password!==$confirmpassword){
		$_SESSION["Errormessage"]="password/confirmpassword does not match";
		header("Location:admin.php");
		exit;
		
	}else{
		$Connection=mysqli_connect('localhost','root','','cms');
		$Query="insert into registration(datetime,name,password,addedby) values('$date','$username','$password','$admin')";
        $Execute=mysqli_query($Connection,$Query);
		if($Execute){
			$_SESSION["successmessage"]="Admin added successfully";
		    header("Location:admin.php");
		    exit;
		}else{
			$_SESSION["Errormessage"]="Admin failed to add";
		    header("Location:admin.php");
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
	 <style>
 #heading{
font-family:Bitter,Georgia,"Times New Roman".Times,serif;
 font-weight:bold;
color:#005E90;

}
#heading:hover{
	color: #0090DB;
}
.rainbow {
  background-image: -webkit-gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );
  background-image: gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );
  color:transparent;
  -webkit-background-clip: text;
  background-clip: text;
  font-size:30px;
  
}
.line {
    margin-top: -20px;
}
.navbar-nav li {
    font-weight: bold;
    font-family: Bitter,Georgia,Times,"Times New Roman",serif;
    font-size: 1.2em;
}
h2{
	color:white;
}
	 </style>
</head>
<body>
<div style="height:10px; background:#27aae1;"></div>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
	    <div class="navbar-header">
		<button type="navbar-brand" class="navbar-toggle collapsed" data-toggle="collapse"
		data-target="#collapse">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="blog.php">
<span class="rainbow">Sandy</span>
        </a>
        </div>
		<div class="collapse navbar-collapse" id="collapse">
		<ul class="nav navbar-nav">
		   <li><a href="#">Home</a></li>
		   <li class="active" ><a href="blog.php">Blog</a></li>
		   <li><a href="#">About Us</a></li>
		   <li><a href="#">Services</a></li>
		   <li><a href="#">Contact</a></li>
		   <li><a href="#">Feature</a></li>
		</ul>
		<form action="blog.php" class="navbar-form navbar-right" >
		<div class="form-group">
		<input type="text" class="form-control" placeholder="search" name="search">
		</div>
		<button class="btn btn-default" name="searchbutton">Go</button>
		
		</form>
		</div>
    </div>
</nav>
<div class="line" style="height:10px; background:#27aae1;"></div>
<div class="container-fluid">
<div class="row">
     <div class="col-sm-2">
	 <h2>Grains</h2>
	 <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li><a href="simple.php">
				<span class="glyphicon glyphicon-th"></span>&nbsp Dashboard</a></li>
                <li><a href="addnewpost.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp Add new post</a></li>
				<li><a href="Categories.php">
				<span class="glyphicon glyphicon-tags"></span>&nbsp Catagories</a></li>
				<li class="active" ><a href="admin.php">
				<span class="glyphicon glyphicon-user"></span>&nbsp Manage admin</a></li>
				<li><a href="comments.php">
				<span class="glyphicon glyphicon-comment"></span>&nbsp Comments</a></li>
				<li><a href="logout.php">
				<span class="glyphicon glyphicon-log-out"></span>&nbsp Logout</a></li>
            </ul>


	 
	 </div>
     <div class="col-sm-10">
	 <h1>Manage Admin Access</h1>
	 <div><?php echo message(); 
	       echo successmessage(); ?></div>
	 <div>
	 <form action="admin.php" method="POST">
	 <fieldset>
	<div class="form-group">
	    <label for="categoryname">Username:</label>
		<input class="form-control" type="text" name="username" id="username" placeholder="Username">
	 </div>
	 <div class="form-group">
	    <label for="categoryname">Password:</label>
		<input class="form-control" type="password" name="password" id="password" placeholder="Password">
	 </div>
	 <div class="form-group">
	    <label for="categoryname">confirm password:</label>
		<input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Retype same password">
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
		<th>Admin Name</th>
		<th>Added by</th>
		<th>Action</th>
		</tr>
	 <?php 
	    $Connection=mysqli_connect('localhost','root','','cms');
		$Query="select * from registration order by datetime desc";
        $Execute=mysqli_query($Connection,$Query);
		$sr=0;
		while($rows=mysqli_fetch_array($Execute)){
			$id=$rows["id"];
			$datetime=$rows["datetime"];
			$username=$rows["name"];
			$addedby=$rows["addedby"];
		    $sr++;
	 ?>
	 <tr>
	     <td><?php echo $sr;?></td>
		 <td><?php echo $datetime;?></td>
		 <td><?php echo $username;?></td>
		 <td><?php echo $addedby;?></td>
		 <td><a href="deleteadmin.php?id=<?php echo $id;?>" ><span class="btn btn-danger">Delete</span></a></td>
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
	<p>Email:gajawadaprashanth@gmail.com</p>
	<hr>
</div>
</body>
</html>