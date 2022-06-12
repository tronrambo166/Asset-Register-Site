
<?php 

include "header.php";
?>


	
	
	<?php  
	
    
	
	
	if(isset($_POST['login'])){

		
		$email=$_POST['email'];
		$password=$_POST['password'];
		//$password=password_hash($password, PASSWORD_DEFAULT);
		
		$sel="select * from users where email='$email'";
		$run=$db->select($sel);
		$row=$run->fetch_assoc();
		
		//print_r($row);
		
		if($run->num_rows >0){
			
			if(password_verify($password,$row['password'])){
				
				
				$_SESSION['userId']=$row['id'];
				$_SESSION['userLoggedId']=$row['email'];
				$_SESSION['username']=substr($email,0,strpos($email,'@'));
				
				setcookie('logstd','logged',time()+(86400),'/');
			header('location:index.php'); exit;
			}
			else $_SESSION['p']="Wrong Password";
		}
		else
		$_SESSION['e']="Invalid Email or Password";
		
	}	
	
	
	?>
	
	
	
	
	
	
	
	
	
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow border-0 rounded-lg mt-5">
                                    <div class="card-header bg-light"><h3 class="text-center font-weight-light my-4"><b>Serial Safe - Login</b></h3></div>
                                    <div class="card-body">
									
                                        
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
class=" w-50 m-auto btn btn-info text-dark d-block font-weight-bold "  name="login" value="Login" />                                 

       </form>
										
                                    </div>
									
									<div class="mt-2 text-center"> dont have an account? <a href="register.php" class="py-0 btn btn-primary">
                                    Register
                                </a>
                            </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            

<?php 

include "footer.php";

?>