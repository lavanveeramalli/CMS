<?php //require_once("connection.php");?>
<?php require_once("session.php"); ?>
<?php

?>

<!DOCTYPE>
<html>
<head>
     <title>Add to cart</title>
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
















<div class="row">
     <div class="col-sm-8">
	 














<div class="line"style="height:10px; background:#27aae1;"></div>
<div class="container-fluid">
<div class="row">
     
     <div class="col-sm-offset-4 col-sm-4"><br><br><br>
	  <div><?php echo message(); 
	       echo successmessage(); ?></div>
	 <h2>Cart</h2>
	
	 <div>
	 <form action="payment.php" method="POST">
	 <fieldset>
	<div class="form-group">
	<label for="categoryname">Full name:</label>
	<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-envelope text-primary"></span>
	</span>
	    
		<input class="form-control" type="text" name="username" id="username" placeholder="lavan">
	 </div>
	 </div>
	 <div class="form-group">
	<label for="categoryname">Gmail:</label>
	<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-envelope text-primary"></span>
	</span>
	    
		<input class="form-control" type="text" name="gmail" id="username" placeholder="lavan@gmail.com">
	 </div>
	 </div>
	 <div class="form-group">
	    <label for="categoryname">Address:</label>
		<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
		<input class="form-control" type="text" name="password" id="password" placeholder="hyderabad">
	 </div>
	 </div>
	 <div class="form-group">
	    <label for="categoryname">City:</label>
		<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
		<input class="form-control" type="text" name="confirmpassword" id="password" placeholder="hyderabad">
	 </div>
	 </div>

	 <div class="form-group">
	    <label for="categoryname">Area:</label>
		<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
		<input class="form-control" type="text" name="confirmpassword" id="password" placeholder="kukatpally">
	 </div>
	 </div>
	 
	 <div class="form-group">
	    <label for="categoryname">State:</label>
		<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
		<input class="form-control" type="text" name="confirmpassword" id="password" placeholder="Telangana">
	 </div>
	 </div>
	 
	 <div class="form-group">
	    <label for="categoryname">Pin Code:</label>
		<div class="input-group">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
		<input class="form-control" type="text" name="confirmpassword" id="password" placeholder="pincode">
	 </div>
	 </div>
	 <button class="btn btn-info btn-block" onclick = "payment();" >Payment</button>
	 <br>
	 <br>
	


	 </fieldset> 
	 <br>
	 </form>
	 </div>
	 
	 </div>
</div>
</div>
<script>
function payment()
{window.location.replace("http://localhost/CMS/payment.php")}





</script>
</body>
</html>