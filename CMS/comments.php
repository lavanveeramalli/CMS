<?php require_once("session.php"); ?>
<!DOCTYPE>
<html>
<head>
     <title>Comments</title>
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
		   <li><a href="#">Home</a></li>
		   <li class="active" ><a href="blog.php" target="_blank">Blog</a></li>
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
<div class="line"style="height:10px; background:#27aae1;"></div>
<div class="container-fluid">
<div class="row">
     <div class="col-sm-2">
	 <br><br>
	 <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li><a href="simple.php">
				<span class="glyphicon glyphicon-th"></span>&nbsp Dashboard</a></li>
                <li><a href="addnewproduct.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp Add new post</a></li>
				<li><a href="Categories.php">
				<span class="glyphicon glyphicon-tags"></span>&nbsp Catagories</a></li>
				<li><a href="admin.php">
				<span class="glyphicon glyphicon-user"></span>&nbsp Manage admin</a></li>
				<li  class="active"><a href="comments.php">
				<span class="glyphicon glyphicon-comment"></span>&nbsp Comments</a></li>
				<li><a href="logout.php">
				<span class="glyphicon glyphicon-log-out"></span>&nbsp Logout</a></li>
            </ul>
	 
	 
	 
	 </div>
     <div class="col-sm-10">
	 <div><?php echo message(); 
	  echo successmessage(); ?></div>
	 <h1>Un-approved comments</h1>  
	 <div class="table-responsive">
	 <table class="table table-striped table-hover">
	    <tr>
		    <th>No.</th>
			 <th>Name</th>
			 <th>Date</th>
			 <th>Comment</th>
			  <th>Approve</th>
			 <th>Delete Comment</th>
             <th>Details</th>			 
		</tr>
		<?php
		$Connection=mysqli_connect('localhost','root','','cms');
		$Query="select * from comments where status='OFF' order by datetime desc";
        $Execute=mysqli_query($Connection,$Query);
		$no=0;
		while($row=mysqli_fetch_array($Execute)){
		   $id=$row['id'];
		   $date=$row['datetime'];
		   $name=$row['name'];
		   $comment=$row['comment'];
		   $tableid=$row['tableid'];
		   $no++;
		   
		?>
		<tr>
		    <td><?php echo $no;?></td>
			<td style="color:#5e5eff;"><?php echo $name;?></td>
			<td><?php echo $date;?></td>
			<td><?php echo $comment;?></td>
			<td><a href="approvecomments.php?id=<?php echo $id; ?>"><span class="btn btn-success">Approve</span></a></td>
			<td><a href="deletecomment.php?id=<?php echo $id; ?>" ><span class="btn btn-danger">Delete</span></a></td>
			<td><a href="fullpost.php?id=<?php echo $tableid;?>" target="_blank" ><span class="btn btn-primary">Live preview</span></a></td>
		</tr>
		<?php } ?>
	 </table>
     </div>
	 
	 <h1>approved comments</h1>  
	 <div class="table-responsive">
	 <table class="table table-striped table-hover">
	    <tr>
		    <th>No.</th>
			 <th>Name</th>
			 <th>Date</th>
			 <th>Comment</th> 
			 <th>Approved by</th>
			  <th>Revert Approve</th>
			 <th>Delete Comment</th>
             <th>Details</th>			 
		</tr>
		<?php
		$Connection=mysqli_connect('localhost','root','','cms');
		$Query="select * from comments where status='On' order by datetime desc ";
        $Execute=mysqli_query($Connection,$Query);
		$no=0;
		while($row=mysqli_fetch_array($Execute)){
		   $id=$row['id'];
		   $date=$row['datetime'];
		   $name=$row['name'];
		   $comment=$row['comment'];
		   $approvedby=$row['approvedby'];
		   $tableid=$row['tableid'];
		   $no++;
		   
		?>
		<tr>
		    <td><?php echo $no;?></td>
			<td style="color:#5e5eff;"><?php echo $name;?></td>
			<td><?php echo $date;?></td>
			<td><?php echo $comment;?></td>
			<td><?php echo $approvedby?></td>
			<td><a href="disapprove.php?id=<?php echo $id;?>" ><span class="btn btn-warning">disApprove</span></a></td>
			<td><a href="deletecomment.php?id=<?php echo $id;?>" ><span class="btn btn-danger">Delete</span></a></td>
			<td><a href="fullpost.php?id=<?php echo $tableid;?>"target="_blank"  ><span class="btn btn-primary">Live preview</span></a></td>
		</tr>
		<?php } ?>
	 </table>
     </div>
	 
	 
	 
	 </div>
</div>
</div>
<div id="footer">
    <hr><p>Theme by  |  Sandy prashanth  |&copy:2019-2020 --All are reserved.</p>
	<p>For more details just contact to:8520949757</p>
	<p>Email:gajawadaprashanth@gmail.com</p>
	<hr>
</div>
</body>
</html>