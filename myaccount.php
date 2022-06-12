<?php 

include "header.php";

        if(isset($_SESSION['userId'])) 
		{ $id=$_SESSION['userId'];
		$sel="select * from users where id='$id'";
		$run=$db->select($sel);
		$row=$run->fetch_assoc();
		}
		
		
		
		if(isset($_POST['update'])){
	
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$phone=$_POST['phone'];
		$zipcode=$_POST['zipcode'];
		$street=$_POST['street'];
		$city=$_POST['city'];
		$country=$_POST['country'];
		
	 $up="update users set fname='$fname',lname='$lname',phone='$phone',zipcode='$zipcode',
	 street='$street',city='$city',country='$country' where id='$id' ";
	 
		
	    $run=$db->update($up);		
	    if($run == true) { 	
		
		$_SESSION['success']="Info Updated!";
		header('location:myaccount.php');
		exit;
		
		
	}
		}
		
		
		
		
?>


<style type="text/css"> body{color:grey;} </style>


<!--content start-->
    <div class="container">
    	<div class="row">
    		<div class="col-3"></div>
    		<div class="col">
			<h1 style="color:#244574;">My Account</h1>
			<p>View and edit your personal info below.</p>
			<div class="my-3" style="background:#ddd;height:1px;"></div>
			<h4>Display Info</h4>
			<p>Your profile card is visible to all member of this site</p>
			<p class="mt-0 pt-0 ">Display Name* </p>
			<input type="text" class="border border-bottom" value="<?php echo $_SESSION['username']; ?>" readonly />
			<div class="my-3" style="background:#ddd;height:1px;"></div>
			
			<br/>
			<h5>Account</h5>
			<p>Update & Edit the information you share with the community.</p>
			<br/>
			<h6>Login Email: <?php if(isset($_SESSION['userLoggedId'])) echo $_SESSION['userLoggedId']; ?></h6>
			<!--add email here-->
			<p>Your Login email can't be changed</p>
			
			
			
			
		<div class="mt-5 mx-auto">
			
		    <form class="mx-auto" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post" enctype="multipart/form-data">
	
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="username">First Name</label></div>
					
		    		<div class="col-sm-7"> 
					<input class="form-control form-group" type="text" value="<?php echo $row['fname'];?>" name="fname" id="username" placeholder="Enter Username"  /> 
					
					</div>
					<div class="col-sm-4"> <?php if(isset($error['username'])) echo " * ".$error['username'];?></div>

					
		    	</div>
				
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="email">Last Name</label></div>
					
		    		<div class="col-sm-7"> 
					<input class="form-control form-group" value="<?php echo $row['lname'];?>" type="text" name="lname" id="email" placeholder="Enter Name"  /> 

					</div>
					
						<div class="col-sm-4"> <?php if(isset($error['email'])) echo " * ".$error['email'];?></div>
				
		    	</div>
				
				
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="phone">Phone</label></div>
					
		    		<div class="col-sm-7"> 
					<input class="form-control form-group" value="<?php echo $row['phone'];?>" type="number" name="phone" id="phone" placeholder="Enter Phone"  /> 
					
					</div>
					<div class="col-sm-4"> <?php if(isset($error['phone'])) echo " * ".$error['phone'];?></div>

					
		    	</div>
				
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="password"><strong>Address</strong></label></div>
					
		    		
		    	</div>
				
				
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="password">Street</label></div>
					
		    		<div class="col-sm-7"> 
					<input class="form-control form-group" value="<?php echo $row['street'];?>" type="text" name="street" id="street" placeholder="Enter street" /> 

					
					</div>
					
					<div class="col-sm-4"> <?php if(isset($error['password'])) echo " * ".$error['password'];?></div>
					
		    	</div>
				
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="password">City</label></div>
					
		    		<div class="col-sm-7"> 
					<input class="form-control form-group" value="<?php echo $row['city'];?>" type="text" name="city" id="city" placeholder="Enter city" /> 

					
					</div>
					
					<div class="col-sm-4"> <?php if(isset($error['password'])) echo " * ".$error['password'];?></div>
					
		    	</div>
				
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="password">Zipcode</label></div>
					
		    		<div class="col-sm-7"> 
					<input class="form-control form-group" value="<?php echo $row['zipcode'];?>" type="text" name="zipcode" id="zipcode" placeholder="Enter zipcode" /> 

					
					</div>
					
					<div class="col-sm-4"> <?php if(isset($error['password'])) echo " * ".$error['password'];?></div>
					
		    	</div>
				
				
				<div class="row form-group">
		    		<div class="col-sm-1"><label for="password">Country</label></div>
					
		    		<div class="col-sm-7"> 
					<select class="form-control form-group" type="text" name="country" id="country"  > 
					
		<option hidden selected value="<?php echo $row['country'];?>" ><?php echo $row['country'];?></option>		
		<option value="USA">USA</option>
		<option value="Canada">Canada</option>
		<option value="bangladesh">bangladesh</option>
		<option value="Africa">Africa</option>
		<option value="INDIA">INDIA</option>
		<option value="PAKISTAN">PAKISTAN</option>
					</select>
					</div>
					
					<div class="col-sm-4"> <?php if(isset($error['password'])) echo " * ".$error['password'];?></div>
					
		    	</div>
				
				
				
				
				
				
				<!--
				<div class="row form-group">
		    		<div class="col-sm-1 "><label for="photo"><strong>Upload files</strong></label></div>
					
		    		<div class="col-sm-7"> 
					<input class=" form-group bg-info" type="file" name="photo" id="photo" /> 
					</div>
					
		    	</div> -->
				
				<div class="clearfix"></div>
				
				<input style=" background: aliceblue;border-radius: 20px;margin-left: 215px; " type="submit" name="update" value="Update"
				class="w-25 my-4 btn btn-info text-dark d-block font-weight-bold" />
				
		    </form>
			
			
			</div>
			
			
			
			</div>
    	</div>
    </div>

<?php 

include "footer.php";

 ?>