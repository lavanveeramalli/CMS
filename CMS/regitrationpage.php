<?php //require_once("connection.php");?>
<?php require_once("session.php"); ?>
<?php
if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$gmail=$_POST["gmail"];
	if(empty($username)||empty($password)||empty($gmail)){
		$_SESSION["Errormessage"]="All fields must be filled";
		header("Location:regitrationpage.php");
		exit;	
	}else{
		$Connection=mysqli_connect('localhost','root','','cms');
		$sql="insert into userregistration(username,gmail,password) values('$username','$gmail',$password)";
		$execute=mysqli_query($Connection,$sql);
		if($execute){
		$_SESSION["successmessage"]="Register Successfully ";
			header("Location:login.php");
		}else{
           $_SESSION["Errormessage"]="something went roung";
		   header("Location:regitrationpage.php");
        }			
	}
}
?>

<!DOCTYPE>
<html>
<head>
     <title>Registration page</title>
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
	background-color:white;
}

.navbar-nav li{
	font-weight: bold;
	font-family: Bitter,Georgia,Times,"Times New Roman",serif;
	font-size:1.2em;
}
.line{
	margin-top: -20px;
}
.rainbow {
  background-image: -webkit-gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );
  background-image: gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );
  color:transparent;
  -webkit-background-clip: text;
  background-clip: text;
  font-size:30px;
  
}
</style>
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
		
		
		</div>
    </div>
</nav>
<div class="line"style="height:10px; background:#27aae1;"></div>
<div class="container-fluid">
<div class="row">
     
     <div class="col-sm-offset-4 col-sm-4"><br><br><br>
	  <div><?php echo message(); 
	       echo successmessage(); ?></div>
	 <h2>Register!</h2>
	
	 <div>
	 <form action="regitrationpage.php" method="POST">
	 <fieldset>
	<div class="form-group">
	<label for="categoryname">Username:</label>
	<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-envelope text-primary"></span>
	</span>
	    
		<input class="form-control" type="text" name="username" id="username" placeholder="Username">
	 </div>
	 </div>
	 <div class="form-group">
	<label for="categoryname">Gmail:</label>
	<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-envelope text-primary"></span>
	</span>
	    
		<input class="form-control" type="text" name="gmail" id="username" placeholder="gmail id">
	 </div>
	 </div>
	 <div class="form-group">
	    <label for="categoryname">Password:</label>
		<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
		<input class="form-control" type="password" name="password" id="password" placeholder="Password">
	 </div>
	 </div>
	 <div class="form-group">
	    <label for="categoryname">Confirm Password:</label>
		<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
		<input class="form-control" type="password" name="confirmpassword" id="password" placeholder="confirmpassword">
	 </div>
	 </div>
	 <br>
	 <input class="btn btn-info btn-block" type="submit" name="submit" value="login">
	 <br>
	 <label for="categoryname">Already Have An Account?</label></b></span><a href="login.php"><b>login</b></a>
	 </fieldset> 
	 <br>
	 </form>
	 </div>
	 
	 </div>
</div>
</div>

</body>
</html>