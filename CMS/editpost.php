<?php //require_once("connection.php");?>
<?php require_once("session.php") ;?>
<?php
if(isset($_POST["submit"])){
	$title=$_POST["title"];
	$category=$_POST["category"];
	$post=$_POST["post"];
	date_default_timezone_set("Asia/Karachi");
    $currenttime=time();
    $date=strftime("%Y-%m-%d %H:%M:%S",$currenttime);
    echo $date; 
	$admin="Prashanth";
	$image=$_FILES["image"]["name"];
	$target="Upload/".basename($_FILES["image"]["name"]);
	if(empty($title)){
		$_SESSION["Errormessage"]="Title can't be empty";
		header("Location:addnewproduct.php");
		exit;
		
	}else if(strlen($title)<2){
		$_SESSION["Errormessage"]="Title should be at-least 2 charecters";
		header("Location:addnewproduct.php");
		exit;
		
	}else{
		$idd=$_GET['id'];
		$Connection=mysqli_connect('localhost','root','','cms');
		$Query="update tablepanel set datetime='$date',title='$title',category='$category',
		author='$admin',image='$image', post='$post' where id='$idd'";
        $Execute=mysqli_query($Connection,$Query);
		move_uploaded_file($_FILES["image"]["tmp_name"],$target);
		if($Execute){
			$_SESSION["successmessage"]="Post update successfully";
		    header("Location:simple.php");
		    exit;
		}else{
			$_SESSION["Errormessage"]="Something went wroung. try again";
		     header("Location:simple.php");
		    exit;
		}
	}
}
?>

<!DOCTYPE>
<html>
<head>
     <title>Edit Post</title>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
<div class="container-fluid">
<div class="row">
     <div class="col-sm-2">
	 <h1>prashanth</h1>
	 <ul id="side_menu" class="nav nav-pills nav-stacked">
                <li><a href="simple.php">
				<span class="glyphicon glyphicon-th"></span>&nbsp Dashboard</a></li>
                <li class="active"><a href="addnewproduct.php">
				<span class="glyphicon glyphicon-list-alt"></span>&nbsp Add new post</a></li>
				<li><a href="Categories.php">
				<span class="glyphicon glyphicon-tags"></span>&nbsp Catagories</a></li>
				<li><a href="#">
				<span class="glyphicon glyphicon-user"></span>&nbsp Manage admin</a></li>
				<li><a href="#">
				<span class="glyphicon glyphicon-comment"></span>&nbsp Comments</a></li>
				<li><a href="#">
				<span class="glyphicon glyphicon-log-out"></span>&nbsp Logout</a></li>
            </ul>
	 
	 
	 
	 </div>
	
     <div class="col-sm-10">
	 <h1>Update Post</h1>
	 <div><?php echo message(); 
	       echo successmessage(); ?></div>
	 <div>  
	  <?php
	    $id=$_GET['id'];
		$Connection=mysqli_connect('localhost','root','','cms');
		$query="select * from tablepanel where id='$id'";
		$Execute=mysqli_query($Connection,$query);
	    while($row=mysqli_fetch_array($Execute)){
			$postid=$row["id"];
			$title=$row["title"];
			$category=$row["category"];
			
			$image=$row["image"];
		    $post=$row["post"];
		}
	 ?>
	 <form action="editpost.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
	 <fieldset>
	        <div class="form-group">
	    <label for="title">Title:</label>
		<input class="form-control" type="text" value="<?php echo "$title";?>" name="title" id="title" placeholder="title">
	 </div>
	 <div class="form-group">
	    <span class="FieldInfo"><b>Existing Category:</b></span>
		<?php echo "$category";?><br>
	    <label for="Categoryname">Category:</label>
		<select class="form-control" id="Categoryselect" name="category">
		<?php 
	    $Connection=mysqli_connect('localhost','root','','cms');
		$Query="select * from category order by datetime desc";
        $Execute=mysqli_query($Connection,$Query);
		
		while($rows=mysqli_fetch_array($Execute)){
			$id=$rows["id"];
			$name=$rows["name"];
		    
	 ?>
		<option><?php echo $name;?></option>
		<?php } ?>
		</select>
	</div>
	<div class="form-group">
	<span class="FieldInfo"><b>Existing Image:</b></span>
	<img src="upload/<?php echo $image; ?>" width=170px; height=50px;><br>
	    <label for="imageselect">Select image:</label>
		<input type="file" class="form-control" name="image" id="imageselect">
	</div>
    <div class="form-group">
	    <label for="Postarea">Post:</label>
        <textarea class="form-control" name="post" id="postarea"><?php echo $post;?></textarea>
	</div>
	 <br>
	 <input class="btn btn-success btn-block" type="submit" name="submit" value="Update Post">
	 </fieldset> 
	 <br>
	 </form>
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