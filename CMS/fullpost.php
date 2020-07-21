<?php require_once("session.php") ;?> 
<?php
if(isset($_POST["submit"])){
	$name=$_POST["name"];
	$email=$_POST["email"];
	$comment=$_POST["comment"];
	date_default_timezone_set("Asia/Karachi");
    $currenttime=time();
    $date=strftime("%Y-%m-%d %H:%M:%S",$currenttime);
    echo 'pra';
    $id=$_GET['id'];	
	if((empty($name))||(empty($email))||(empty($comment))){
		$_SESSION["Errormessage"]="All fields required";
		echo "1";
		
	}else if(strlen($comment)>500){
		$_SESSION["Errormessage"]="only 500 charecters are allowed";
		echo "2";
		
	}else{
		$idd=$_GET['id'];
		$Connection=mysqli_connect('localhost','root','','cms');
		$Query="insert into comments(datetime,name,email,comment,approvedby,status,tableid)
		values('$date','$name','$email','$comment','pending','OFF','$idd')";
        $Execute=mysqli_query($Connection,$Query);
		echo "3";
		if($Execute){
			$_SESSION["successmessage"]="comment added successfully";
		    header("Location:fullpost.php?id=$id");
		    exit;
		}else{
			$_SESSION["Errormessage"]="Something went wroung. try again";
		     header("Location:fullpost.php?id=$id");
		    exit;
		}
	}
}
?>
<!DOCTYPE>
<html>
<head>
     <title>Fullpost</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="style.css">
	<style>
	
	#footer{
	padding:10px;
	border-top: 1px solid black;
	color:#eeeeee;
	background-color:#211f22;
	text-align: center;
}
.blogpost{
	background-color:#f5f5f5;
	padding-left: 10px;
	padding-right: 10px;
	padding-top: 10px;
	overflow: hidden;
}
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
.description{
	color: #868686;
	font-weight:bold;
	margin-top:-2px;
}
.post{
	font-size: 1.1em;
	
}
.btn-info{
	float:right;
}

.comment{
	margin-top:-2px;
	padding-bottom:10px;
	font-size:1.1em;
}
.background{
	background-color:#F6F7F9;
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
		   <li class="active" ><a href="blog.php">Blog</a></li>
		   <li><a href="about.php">About Us</a></li>
		   
		   <li><a href="contact.php">Contact</a></li>
		  
		</ul>
		<form action="fullpost.php" class="navbar-form navbar-right" >
		<div class="form-group">
		<input type="text" class="form-control" placeholder="search" name="search">
		</div>
		<button class="btn btn-default" name="searchbutton">Go</button>
		
		</form>
		</div>
    </div>
</nav>
<div class="line"style="height:10px; background:#27aae1;"></div>
<div class="container">
   <div class="blog-header">
     <h1>The complete responsive CMS blog</h1>
<p class="lead">The complete blog by Sandy</p>
<?php echo message(); 
	       echo successmessage(); 
	?>
</div>
  <div class="row">
     <div class="col-sm-8">
	 
	    <?php
		$Connection=mysqli_connect('localhost','root','','cms');
		global $Connection;
		if(isset($_GET['searchbutton'])){
			$search=$_GET['search'];
			$Query="select * from tablepanel where title LIKE '%$search%' OR datetime LIKE '%$search%' OR post LIKE '%$search%'";
			
		}
		else{
		$id=$_GET['id'];
		$Query="select * from tablepanel where id='$id' order by datetime desc";}
        $Execute=mysqli_query($Connection,$Query);
		while($row=mysqli_fetch_array($Execute)){
			$postid=$row["id"];
			$datetime=$row["datetime"];
			$title=$row["title"];
			$category=$row["category"];
			$author=$row["author"];
			$image=$row["image"];
			$post=$row["post"];
		
		?>
		<div class="blogpost thumbnail">
		  
		  <img class="img-responsive img-rounded"  width="250" src="upload/<?php echo $image;?>">
	    <div class="caption">
		      <h1 id="heading" class="text-primary"><?php echo htmlentities($title); ?></h1>
			  <p class="description">category:<?php echo htmlentities($category);?> 
			  Published on:<?php echo htmlentities($datetime);?></p>
			  <p class="post"><?php echo nl2br($post);?></p>
		</div>
		
		</div>
		<?php } ?>
		<span style="color:red;">Comments</span> 
		<?php
		$Connection=mysqli_connect('localhost','root','','cms');
		$sid=$_GET['id'];
		$query="select * from comments where tableid='$sid' AND status='ON'";
        $Execute=mysqli_query($Connection,$query);
		while($row=mysqli_fetch_array($Execute)){
		   $date=$row['datetime'];
		   $name=$row['name'];
		   $comment=$row['comment'];
		
		?>
		<div class="media" style="background-color:#F6F7F9;">
		   <img class="pull-left" src="user.png" width=70px; height=70px>
		   <div class="media-body">
		   <p class="h4 text-primary"><?php echo $name; ?></p>
		    <p class="description" ><?php echo $date; ?></p>
			 <p class="comment"><?php echo nl2br($comment); ?></p>
			 </div>
		</div>
		<br>
		<hr>
		<?php } ?>
		<span style="color:red;">Share your throughts about this post:</span><br>
		
		<div>
	 <form action="fullpost.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
	 <fieldset>
	<div class="form-group">
	    <label for="title">Name:</label>
		<input class="form-control" type="text" name="name" id="Name" placeholder="Name">
	 </div>
	 <div class="form-group">
	    <label for="title">Email:</label>
		<input class="form-control" type="text" name="email" id="Email" placeholder="Email">
	 </div>
    <div class="form-group">
	    <label for="Postarea">Comment:</label>
        <textarea class="form-control" name="comment" id="Comment"></textarea>
	</div>
	 
	 <input class="btn btn-primary" type="submit" name="submit" value="Submit">
	
	 
	 <a href="cart.php?id=<?php echo $postid;?>">
	 <span class="btn btn-primary">Add to Cart</span></a>
	</div>






	 </fieldset> 
	 <br>
	 </form>
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