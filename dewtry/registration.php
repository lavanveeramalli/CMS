<?php //require_once("connection.php");?>
<?php require_once("session.php"); ?>
<?php
if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$gmail=$_POST["gmail"];
	if(empty($username)||empty($password)||empty($gmail)){
		$_SESSION["Errormessage"]="All fields must be filled";
		header("Location:registration.php");
		exit;	
	}else{
		$Connection=mysqli_connect('localhost','root','','dewtry');
		$sql="insert into registration(username,gmail,password) values('$username','$gmail',$password)";
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


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
   <!--Made with love by Mutiullah Samim -->
   <link rel="stylesheet" href="loginstyle.css">
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="registration.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" id="username" placeholder="username">
						
						
						
					</div>


					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control"name="gmail" id="username"  placeholder="Gmail">
						
						
						
					</div>
 

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="password" class="form-control" name="password" id="password" placeholder="Confirm password">
						
						
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="confirmpassword" id="password" placeholder="password">
						
					</div>
					<div class="row align-items-center remember">
						
					</div>
					<div class="form-group">
						<input type="submit"  name="submit" value="Register" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
				 Have an account?<a href="login.php">Login</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>