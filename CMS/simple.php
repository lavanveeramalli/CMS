<?php require_once("session.php"); ?>

<!DOCTYPE>
<html>
<head>
     <title>Dashboard</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	 <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="adminstyle.css">
	 <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	 <style>
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

body{
	background-color:#2f4050;
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
		   <li><a href="home.php">Home</a></li>
		   <li class="active" ><a href="blog.php" target="_blank">Blog</a></li>
		   <li><a href="about.php">About Us</a></li>
		  
		   <li><a href="contact.php">Contact</a></li>
		   
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
<div class="line"style="height:10px; background:#27aae1;"></div>
<div class="container-fluid">
<div class="row">
     <div class="col-sm-2">
	 <br><br>
	 <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li class="active"><a href="simple.php">
				<span class="glyphicon glyphicon-th"></span>&nbsp Dashboard</a></li>
                <li><a href="addnewproduct.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp Add new post</a></li>
				<li><a href="Categories.php">
				<span class="glyphicon glyphicon-tags"></span>&nbsp Catagories</a></li>
				<li><a href="admin.php">
				<span class="glyphicon glyphicon-user"></span>&nbsp Manage admin</a></li>
				<li><a href="comments.php">
				<span class="glyphicon glyphicon-comment"></span>&nbsp Comments
				<?php
			$Conn=mysqli_connect('localhost','root','','cms');
			$query="select count(*) from comments where status='OFF'";
			$queryExecute=mysqli_query($Conn,$query);
			$count=mysqli_fetch_array($queryExecute);
			$total=array_shift($count);
			if($total>0){
			?>
			<span class="label pull-right label-warning"><?php echo $total;?></span>
			<?php } ?>
				</a></li>
				<li><a href="logout.php">
				<span class="glyphicon glyphicon-log-out"></span>&nbsp Logout</a></li>
            </ul>
	 
	 
	 
	 </div>
     <div class="col-sm-10">
	 <div><?php echo message(); 
	  echo successmessage(); ?></div>
	 <h1>Admin Dashboard</h1>  
	  <div class="table-responsive">
	    <table class="table table-striped table-hover">
		    <tr>
			    <th>No.</th>
				<th>Post Title</th>
				<th>Date & Time</th>
				<th>Author</th>
				<th>Category</th>
				<th>Banner</th>
				<th>Comments</th>
				<th>Actions</th>
				<th>Details</th>
		    </tr>
			<?php
			$Connection=mysqli_connect('localhost','root','','cms');
			$query="select * from tablepanel order by datetime desc;";
			$Execute=mysqli_query($Connection,$query);
			$sr=0;
			while($row=mysqli_fetch_array($Execute)){
			$postid=$row["id"];
			$datetime=$row["datetime"];
			$title=$row["title"];
			$category=$row["category"];
			$author=$row["author"];
			$image=$row["image"];
			$post=$row["post"];
			$sr++;
			?>
			<tr>
			<td><?php echo $sr;?></td>
			<td style="color:#5e5eff;"><?php
			if(strlen($title)>20){$title=substr($title,0,20).'..';}
			echo $title;?></td>
			<td><?php echo $datetime;?></td>
			<td><?php echo $author;?></td>
			<td><?php echo $category;?></td>
			<td><img src="upload/<?php echo $image;?>" width="100"; height="50px";></td>
			<td>
			<?php
			$Conn=mysqli_connect('localhost','root','','cms');
			$query="select count(*) from comments where tableid='$postid' AND status='ON'";
			$queryExecute=mysqli_query($Conn,$query);
			$count=mysqli_fetch_array($queryExecute);
			$total=array_shift($count);
			if($total>0){
			?>
			<span class="label pull-right label-success"><?php echo $total;?></span>
			<?php } ?>
			<?php
			$Conn=mysqli_connect('localhost','root','','cms');
			$query="select count(*) from comments where tableid='$postid' AND status='OFF'";
			$queryExecute=mysqli_query($Conn,$query);
			$count=mysqli_fetch_array($queryExecute);
			$total=array_shift($count);
			if($total>0){
			?>
			<span class="label pull-left label-danger"><?php echo $total;?></span>
			<?php } ?>
			
			</td>
			<td>
			<a href="editpost.php?id=<?php echo $postid; ?>"><img src="ee.png" height="25"></a>
			
			<a href="deletepost.php?id=<?php echo $postid; ?>"><img src="dd.png" height="25"></a> </td>
			<td>
			<a href="fullpost.php?id=<?php echo $postid; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
			</tr>
			<?php  } ?>
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