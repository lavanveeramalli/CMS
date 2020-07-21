
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
   <title>Kramah Software India Private Limited</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
       <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
	<link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
  	<!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
	<!--script for onfunction-->
	<script>
    function captitalize(obj)
    {
     obj.value=obj.value.charAt(0).toUpperCase()+obj.value.slice(1);
    }
    </script>
	
</head>
<body >
   
    
<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                     <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
      <span class="icon-bar"></span>
       <span class="icon-bar"></span>
      <span class="icon-bar"></span>                </button>
                     <a class="navbar-brand" href="#"><img class="logo-custom" src="assets/img/logo.png" alt=""  /></a></div>

<div class="navbar-collapse collapse move-me">
 <ul class="nav navbar-nav navbar-right">
                    <li ><a href="../Dashboard/Final%20Dashboard/homepage.html">HOME</a></li>
                     <li><a href="../Dashboard/Final Dashboard/ds.html">DASHBOARD</a></li>
                    <li><a href="../Key_Indicator/Criteria/Criteria.html">NAAC REPORT PORTAL</a></li>
               
                     <li><a href="../final_report.php">NAAC SCORING PORTAL</a></li>
       <li><a href="../Dashboard/Final%20Dashboard/profile/index.php">USER PROFILE</a></li>
             <li><a href="../login/logout.php">LOGOUT</a></li>
 
 </ul>
 </ul>
 </div>
 

<div class="navbar-collapse collapse move-me">
 <ul class="nav navbar-nav navbar-right">
 <li ><a href="../naacuser2/userhome2.0.php">HOME</a></li>
 <li><a href="../login/testlogin.php">LOGOUT</a></li>
 
 </ul>
 </ul>
 </div>

        </div>
    </div>
      <!--NAVBAR SECTION END--><br/><br/>
        <div  class="tag-line" >
         <div class="container">
           <div class="row  text-center" >
           
               <div class="col-lg-12  col-md-12 col-sm-12">
               
        <h2 data-scroll-reveal="enter from the bottom after 0.1s" >
<span class="bckleft"> <a  href="../7.1.1.1/home_7_1_1.php" class="btn btn-primary btn-lg" > Back  </a></span>



<i class="fa fa-circle-o-notch"></i>7.1.1 Number of gender equity promotion Programmes organized by the institution during the last five years <i class="fa fa-circle-o-notch"></i> 
		


		      <!-- <h3>WELCOME TO DASHBOARDA END</h3>-->
                   
		
		
		</h2> <!-- <h3>WELCOME TO DASHBOARDA END</h3>-->
                   </div>
               </div>
             </div>
        
    </div>
    <!--END OF THE ROW--> 
 
   
<center><br/>
<form action="db_7_1_1.php" method="post" enctype="multipart/form-data">
<div class="table-sec">
 <table cellspacing=0  width="648" height="260" >
	<tr><th>
	Upload Document</th>
	
	<th width="366">
	<input type="file" name="file" style="width:260px;"/></th>
	</tr>
	
	

<tr><th>Title Of The Program::</th>
     <th> <input  type="text" name="Title_program"  id="t0"  style="width:220px;" required   ></th></tr>
<tr><th>Duration:</th><th>
<input type="text" name="Duration"  id="t0" style="width:220px;" required ></th></tr>

<tr><th>Date(From):</th><th>
<input type="date" name="DateFrom"  id="t0" style="width:220px;" required ></th></tr>




<tr><th>Date(To):</th><th>
 <input  type="date" name="DateTo" id="t0" style="width:220px;" required   ></th></tr>


<tr><th>Enter Number Of Participants:</th><th>
 <input  type="number" name="No_of_female_participants" id="t0" style="width:220px;" required   ></th></tr>


<!--- <tr><th>Enter Number Of Male Participants:</th><th>
 <input  type="number" name="No_of_male_participants" id="t0" style="width:220px;" required   ></th></tr> --->


<tr>
<th width="116">Year:</th>
<th>
<?php
//get the current year
$Startyear=date('Y');
$endYear=$Startyear-4;

// set start and end year range i.e the start year
$yearArray = range($Startyear,$endYear);
?>
<!-- here you displaying the dropdown list -->
<select name="year" class="hiii" id="t0">
    <option value="">Year</option>
    <?php
    foreach ($yearArray as $Year) {
        // this allows you to select a particular year
        $selected = ($Year == $Startyear) ? 'selected' : '';
        echo '<option '.$selected.' value="'.$Year.'">'.$Year.'</option>';
    }
    ?>
</select><br>*Note: The Year Mentioned here will be displayed in the Bar Graph
    </th>
  </tr>
 
	<tr><th></th><th>
	
	<button type="upload" name="btn-upload" class ="btn btn-primary btn-lg">Upload</button></th></tr>
	
	
	</table>
   </div>
  </form>
      </center>
	  <br/>
	
       <!--HOME SECTION END--> 
	       
   
    <div id="footer">
      copy&copyright | Kramah Software India Private Limited | All Rights Reserved
        <!--  &copy 2012 kramahsoftware.com | All Rights Reserved |  <a href="http://Kramahsoftwares.com" style="color: #fff" target="_blank">Design by : padmanabha s</a>-->
    </div>
     <!-- FOOTER SECTION END-->
   
      <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts --> 
         <script src="assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts --> 
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts --> 
         <script src="assets/js/custom.js"></script>
</body>
</html>