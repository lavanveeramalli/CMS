<!DOCTYPE>
<html>
<head>
     <title>Blog area</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="style.css">
	<style>
	.imageicon{
		max-width: 150px;
		margin: 2 auto;
		display; block;
	}
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
		   
		   <li><a href="logout.php">Logout</a></li>
				
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
<div class="container">
   <div class="blog-header">
     <h1>The complete responsive CMS blog</h1>
<p class="lead">The complete blog by Sandy</p>
</div>
  <div class="row">
     <div class="col-sm-8">
	    <?php
		$Connection=mysqli_connect('localhost','root','','cms');
		global $Connection;
		if(isset($_GET['searchbutton'])){
			$search=$_GET['search'];
			$Query="select * from tablepanel where title LIKE '%$search%' OR datetime LIKE '%$search%' OR post LIKE '%$search%'";
			
		}elseif(isset($_GET['category'])){
		   $category=$_GET['category'];
		   $Query="select * from tablepanel where category='$category' order by datetime desc";
		
		}
		else if(isset($_GET['page'])){
			$page=$_GET['page'];
			if($page==0||$page<1){
				$showpostfrom=0;
			}else{
			$showpostfrom=($page*5)-5; 	}
		$Query="select * from tablepanel order by datetime desc LIMIT $showpostfrom,5";	
		
		
		}
		else{
		
		$Query="select * from tablepanel order by datetime desc LIMIT 0,5";}
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
		      <h3 id="heading" ><?php echo htmlentities($title); ?></h3>
			  <p class="description">category:<?php echo htmlentities($category);?> 
			  Published on:<?php echo htmlentities($datetime);?></p>
			  <p class="post"><?php
			  if(strlen($post)>150){
				  $post=substr($post,0,150).'...';
			  }
			  echo $post;?></p>
		</div>
		<a href="fullpost.php?id=<?php echo $postid;?>">
		<span class="btn btn-info">Read more &rsaquo;&rsaquo;</span></a>
		</div>
		<?php } ?>
		<nav>
		  <ul class="pagination pull-left pagination-lg">
		<?php
		if(isset($page)){
		if($page>1){
		?>
		<li><a href="blog.pp?page=<?php echo $page-1; ?>">&laquo;</a></li>
		<?php
		}
		}
		?>
		<?php
		global $Connection;
		$pagination="select count(*) from tablepanel";
		$executepagination=mysqli_query($Connection,$pagination);
		$rowpagination=mysqli_fetch_array($executepagination);
		$total=array_shift($rowpagination);
		//echo $total;
		$postperpage=$total/5;
		$postperpage=ceil($postperpage);
		//echo $postperpage;
		for($i=1;$i<=$postperpage;$i++){
		if(isset($page)){
		if($i==$page){ 	
		?>
		
		<li class="active"><a href="blog.php?page=<?php echo $i;?>" ><?php echo $i;?></a></li>
		<?php 
		}else{ ?>
		<li><a href="blog.php?page=<?php echo $i;?>" ><?php echo $i;?></a></li>
			<?php
		}
		}
		} ?>
		<?php
		if(isset($page)){
		if($page+1<=$postperpage){
		?>
		<li><a href="blog.pp?page=<?php echo $page+1; ?>">&raquo;</a></li>
		<?php
		}
		}
		?>
		</ul>
		</nav>
    </div>
	 <div class="col-sm-offset-1 col-sm-3">
	    <h1>About Me</h1>
		<img class="img-responsive img-circle imageicon" src="baby.jpg">
	     <p>
		 Dr. Rosen has published numerous articles 
		 in professional journals in number theory 
		 and in mathematical modeling. He is the 
		 author of the widely used Elementary Number 
		 Theory and Its Applications, published by 
		 Pearson, currently in its sixth edition, 
		 which has been translated into Chinese.
		 He is also the author of Discrete Mathematics 
		 and Its Applications, published by McGraw-Hill, 
		 currently in its seventh edition.
		 
		 </p>
		  <div class="panel panel-primary">
		 <div class="panel-heading">
		 <h2 class="panel-title">Categories</h2>
	 </div>
	 <div class="panel-body background">
	    <?php
		global $Connection;
		$view="select * from category";
		$Executed=mysqli_query($Connection,$view);
		while($datarow=mysqli_fetch_array($Executed)){
			$id=$datarow['id'];
			$category=$datarow['name'];
		
		?>
		<a href="blog.php?category=<?php echo $category;?>">
		<span id="heading"><?php echo $category,"<br>";?></span>
		</a>
		<?php } ?>
	 </div>
	 <div class="panel-footer">
	     
	 </div>
  </div>
  
  
  
  		  <div class="panel panel-primary">
		 <div class="panel-heading">
		 <h2 class="panel-title">Recent Posts</h2>
	 </div>
	 <div class="panel-body">
	   <?php 
	   global $Connection;
	   $query="select * from tablepanel order by datetime desc LIMIT 0,5";
	   $Execut=mysqli_query($Connection,$query);
	   while($data=mysqli_fetch_array($Execut)){
		   $id=$data['id'];
		   $title=$data['title'];
		   $datetime=$data['datetime'];
		   $image=$data['image'];
		   if(strlen($datetime)>11){
			   $datetime=substr($datetime,0,11);
		   }
		 ?>  
		 <div>
		    <img style="margin-top:10px; margin-left:10px;" class="pull-left" src="upload/<?php echo $image;?>" width=70; height=70; >
		    <a href="fullpost.php?id=<?php echo $id;?>">
			<p id="heading" style="margin-left:90px;" ><?php echo htmlentities($title); ?></p></a>
		    <p class="description" style="margin-left:90px;" ><?php echo htmlentities($datetime); ?></p>
		 <hr>
		 </div>
	  <?php } ?>
	   
	 </div>
	 
	 <div class="panel-footer">
	     
	 </div>
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
