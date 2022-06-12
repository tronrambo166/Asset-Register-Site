<?php   session_start(); 
include "universals/sessions.php";
include "universals/class.php";

//if(!isset($_SESSION['userId']) ){	
	//header('location:login.php'); exit;
//}


?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	<?php if(!isset($_GET['page'])) echo 'Home';
	else {
	if($_GET['page']=='home')echo "Home"; else if($_GET['page']=='check') echo "Check an Asset"; 
	else if($_GET['page']=='report') echo "Report Stolen"; else if($_GET['page']=='contact') echo "Contact";
	else echo ''; }?> । Serial Safe

	</title>
	
	
	
	
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="bike.css">
</head>
<body>
<!-- Menu start -->
    <div class="container-fluid menu " style="background:black;">
	<div class="container">
	<div class="row"> 
	<nav class="navbar">
	<a href="#" class="navbar-brand"><img src="img/logo.jpg" alt="" /></a>
		<ul class="nav">
			<li class="nav-item active"><a href="index.php?page=home" class="<?php if($_GET['page']=='home'){ ?> activ <?php } ?> nav-link">Home</a></li>
			<li class="nav-item"><a href="checkabike.php?page=check" class="<?php if($_GET['page']=='check'){ ?> activ <?php } ?>nav-link">Check an Asset</a></li>
			<li class="nav-item"><a href="ReportStolen.php?page=report" class="<?php if($_GET['page']=='report'){ ?> activ <?php } ?>nav-link">Report Asset Lost</a></li>
			<!-- <li class="nav-item"><a href="Contactus.php?page=contact" class="<?php if($_GET['page']=='contact'){ ?> activ <?php } ?>nav-link">Contact us</a></li> -->
		</ul>
		
		<?php  if(isset($_SESSION['userLoggedId'])) { ?> 
		<div class="dropdown mb-3 show">
		<a role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
		class="dropdown text-light dropdown-toggle" href="">  <img class="" style="border-radius: 40px;" src="img/default.png" width="30px" alt="" />
		<h6 class="text-light d-inline ml-2"><?php echo $_SESSION['username']; ?></h6> </a> 
		
		<div class="dropdown-menu " style=" margin-top:5px; margin-left:-13px; " >
    <a class="dropdown-item  py-2" href="myaccount.php">My account</a>
    <a class="dropdown-item  py-2" href="bikerack.php">Assets</a>
    <a class="dropdown-item  py-2" href="logout.php">Logout</a>
  </div>
	</div>	
		
		<?php } else { ?>
		
		<a href="login.php?page=login" class="<?php if($_GET['page']=='login'){ ?> activ <?php } ?> nav-link p-3 login">Log In</a>
	<?php }  ?>
	
	</nav>
	</div>

<?php if(isset($_SESSION['success'])) { ?>	
<div class="text-center bg-success mb-5"><b class=" text-light bg-success font-italic " >

<?php if(isset($_SESSION['success'])) { $reg= $_SESSION['success'];  echo $reg;  unset($_SESSION['success']); } ?></b>

</div>	<?php } ?>
	
	
	</div>
	</div>
<!--Menu End-->