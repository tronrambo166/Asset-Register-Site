<?php 

include "header.php";

if(isset($_POST['send'])){	 
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['email'];
	$message=wordwrap($message,70);
	mail($email,$name,$message); 
	echo "<script type='text/javascript'>alert('Message Sent Succesfully!');</script>";
}

?>


        <div class="container">
		<div class="content">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8" style="text-align:center;">
				<h1 style="color:#244574;">Contact us</h1>
				<p>Need help with our site? Have a media query? Would like to join forces?<br />Don't hesitate to get in contact with us.</p>
				
				<form action="Contactus.php" method="post" >
				<input type="text" name="name" placeholder="Name" style="width:340px;"/>
				<input type="gmail" name="email" placeholder="Email" style="width:340px;" />
				<input type="text" name="message" placeholder="Message" style="width:685px; height:120px;margin-top:20px;"/>
				<button type="submit" name="send" class="btn" style="width:100px;height:40px;margin-top:20px;">Submit</button>
			    </form>
			
				</div>
				<div class="col-2"></div>
			</div>
		</div>
		</div>




<?php 

include "footer.php";

?>