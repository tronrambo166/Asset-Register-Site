
<?php 

include "header.php";

?>


<?php  
	
    
	
	
	if(isset($_POST['register'])){

		
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password=password_hash($password, PASSWORD_DEFAULT);
		$user_ck=" select * from users where email='$email' ";
		
		if($db->select($user_ck)->num_rows > 0) $_SESSION['e']="email already exists !"; 
		else{
			
	 $in="insert into users(email,password) 
		values('$email','$password')";
		
	    $run=$db->insert($in);		
	    if($run == true) { 	
		$_SESSION['userId']=$row['id'];
		$_SESSION['userLoggedId']=$email;
		$_SESSION['username']=substr($email,0,strpos($email,'@'));
		$_SESSION['success']="Registration Successfull !";
		header('location:index.php');
		exit;
		
		
	}
		}
	}		
	
	
	?>
	
	
	
	<!-- Body -->
	
	<!-- Form Design -->
	
	
	
			
		  <div class="w-75 mx-auto card-header bg-light"><h3 class="text-left font-weight-light my-4"><b>Serial Safe - Register</b></h3></div>

				
				
<div class="text-center bg-success mb-5"><b class="bg-success font-italic " >

<?php if(isset($_SESSION['success'])) { $reg= $_SESSION['success'];  echo $reg;  unset($_SESSION['success']); } ?></b>

</div>	

		<div class="w-75 mx-auto">
			
							<form class="" method="post">
										
										<div class="row">
                                            <div class="col-sm-1 mt-2 form-group"><label class=" font weight-bold small mb-1" for="inputEmailAddress">Email</label> </div>
											
											<div class="col-sm-8" > <input placeholder="Enter Email" class="form-control ml-5 pr-5 my-2" name="email" id="inputEmailAddress" type="email" value="<?php if(isset($email)) echo $email; ?>" />
											
											</div>
											</div>
																	<p class="text-danger font-weight-bold font-italic"><?php  if(isset($_SESSION['e'])){ echo $_SESSION['e'];  unset ($_SESSION['e']);}?></p>					

																						
											<div class="row">											
                                            <div class="col-sm-1 mt-2 form-group"><label class="small mb-1" for="inputPassword">Password</label> </div>
											
											<div class="col-sm-8" >
											<input class=" form-control ml-5 pr-5 my-2" name="password" id="inputPassword" type="password" placeholder="Enter password" />
											</div>
											</div>
											
											<p class="text-danger font-weight-bold font-italic"><?php  if(isset($_SESSION['p'])) {echo $_SESSION['p']; $_SESSION['p']="";}?></p>
                                            
											<div class="form-group">
                                                <div class="custom-control custom-checkbox">
												
                                            
											
											</div>
											
<input style=" background: aliceblue;border-radius: 20px; " type="submit" 
class=" w-50 m-auto btn btn-info text-dark d-block font-weight-bold "  name="register" value="Register" />                                 

       </form>
			
			</div>
			
				<div style="margin-right: 320px;" class=" text-center"> already have an account? <a href="login.php" class=" py-0 btn btn-primary">
                                    Login
                                </a>
                            </div>
		
	
	<div class="clearfix"></div>
	
	<!-- Form Design -->
	
	
	
	<!-- Body -->
	
	
	
	
	
	            

<?php 

include "footer.php";

?>