<?php //require_once("connection.php");?>
<?php require_once("session.php") ;?>

<?php
if(isset($_POST["submit"])){
	echo "hffg";
	$title=$_POST["title"];
	$category=$_POST["category"];
	$post=$_POST["post"];
	date_default_timezone_set("Asia/Karachi");
    $currenttime=time();
    $date=strftime("%Y-%m-%d %H:%M:%S",$currenttime);
    echo $date; 
	$admin="sandy";
	$image=$_FILES["image"]["name"];
	$target="Upload/".basename($_FILES["image"]["name"]);
	if(empty($title)){
		$_SESSION["Errormessage"]="Title can't be empty";
		//header("Location:addnewproduct.php");
		exit;
		
	}else if(strlen($title)<2){
		$_SESSION["Errormessage"]="Title should be at-least 2 charecters";
		//header("Location:addnewproduct.php");
		exit;
		
	}else{
		echo "23";
		$Connection=mysqli_connect('localhost','root','','cms');
		$Query="insert into tablepanel(datetime,title,category,author,image,post) values('$date','$title','$category','$admin','$image','$post')";
		echo $Query;
        $Execute=mysqli_query($Connection,$Query);
		move_uploaded_file($_FILES["image"]["tmp_name"],$target);
		if($Execute){
			$_SESSION["successmessage"]="Post added successfully";
		   // header("Location:addnewproduct.php");
		    exit;
		}else{
			$_SESSION["Errormessage"]="Something went wroung. try again";
		    //header("Location:addnewproduct.php");
		    exit;
		}
	}
}
?>

<!DOCTYPE>
<html>
<head>
     <title>Add New Post</title>
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
</style>
<body>
<div class="container-fluid">
<div class="row">
    
     <div class="col-sm-10">
	 <h1>Add New Post</h1>
	 <div><?php echo message(); 
	       echo successmessage(); ?></div>
	 <div>
	 <form action="try.php" method="POST" enctype="multipart/form-data">
	 <fieldset>
	        <div class="form-group">
	    <label for="title">Title:</label>
		<input class="form-control" type="text" name="title" id="title" placeholder="title">
	 </div>
	 <div class="form-group">
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
	    <label for="imageselect">Select image:</label>
		<input type="file" class="form-control" name="image" id="imageselect">
	</div>
    <div class="form-group">
	    <label for="Postarea">Post:</label>
        <textarea class="form-control" name="post" id="postarea"></textarea>
	</div>
	 <br>
	 <input class="btn btn-success btn-block" type="submit" name="submit" value="Add new Post">
	 </fieldset> 
	 <br>
	 </form>
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