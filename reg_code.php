<?php




if(isset($_POST['register'])){
	
		include "database.php";

		
		$error=array();
		$name=$username=$email=$password="";
		
		
		if(empty($_POST['name']))
		{
			$error['name']= "Name is required !";
			
		}
		
		else
		$name=$_POST['name'];
	
	
	
	
	if(empty($_POST['username']))
			$error['username']= "Username is required !";
		else
		$username=$_POST['username'];
	
	
	
	if(empty($_POST['email']))
			$error['email']= "Name is required !";
		else
		{
			//if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				 // $error['email']= "Email is invalid !";
                 // else
		          $email=$_POST['email'];
		}
		
		
		if(empty($_POST['password']))
			$error['password']= "Password is required !";
		else{
		$password=$_POST['password'];
		$password=password_hash($password,PASSWORD_DEFAULT);
		}
	
	
	
	if(empty($_POST['phone']))
			$error['phone']= "Phone is required !";
		else
		$phone=$_POST['phone'];
	
	
	
	$photo = $_FILES['photo']['name'];
	
	//print_r($error);
	
	if(count($error)==0){
		
		$user_ck=" select * from students where Username='$username' ";
		$email_ck=" select * from students where Email='$email' ";
		
		if($connect->query($user_ck)->num_rows > 0) $error['username']="Username already exists !"; 
		else{
			
		if($connect->query($email_ck)->num_rows > 0) $error['email']="Email already exists !"; 
		else{
			
			if($photo==NULL) $in="insert into students(Name,Username,Email,Password,Phone) values('$name','$username','$email','$password','$phone')";
			
			else             $in="insert into students(Name,Username,Email,Password,Phone,Photo) values('$name','$username','$email','$password','$phone','$photo')";
			
			
	    $run=$connect->query($in);
		
	    if($run == true) { 
		
		$_SESSION['success']="Registration Successfull !";
		header('location:Registration.php');
		exit;
		}
		
			
		}
		
		}
		
		
		
		
		
		
	  
	
 

 }
 
}
 
 

 

?>
