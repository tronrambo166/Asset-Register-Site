<?php 

include "header.php";



	if(isset($_POST['search'])){ 
		
		$serial=$_POST['searchSerial'];
		$sel="select * from products where serial='$serial' ";
	    $run=$db->select($sel);
	}
		

?>


<!--content start--> 
      <div class="container">
	  <div class="content">
      	<div class="row">
      		<div class="col-3"></div>
      		<div class="col-6" style="text-align:center;margin-top:50px;">
			<h1 style="color:#253D5F;">Check an Asset</h1>
			<p>Befor buying an Item you should always check to see if it is stolen. <br /> use our free tool below to purchase with confidence.</p>
			</div>
      		<div class="col-3"></div>
      	</div>
		
		<div class="row w-50 mx-auto my-5">
		
		<div id="animation-container " lang="en" class="main" aria-label="Lottie animation">
      <div id="animation " class="animation" style="background:transparent;">
        
<img src="img/s2.png" alt="" />   	 
 </div>
      
    </div>
		
		
		
		</div>
		
		
      </div>
	 </div>
	  <!--content End-->
<!--use animation here-->
	<div style="margin-top:60px;"></div>

<!--search box-->
	  <div class="container mt-5">
      	<div class="row">
      		<div class="col-4"></div>
      		
			
			<div class="col-5">
			<div class="input" style="width:320px;position:absolute;">
			<div class="from-outline">
			
			<form action="" method="post"> 
			<input type="text" name="searchSerial" class="form-control" placeholder="Serial Number"/> 
			</div>
			</div>
			<button type="submit" name="search" class="btn" style="margin-left:340px;background:#1B266F;color:white;">Search</button>
			</form>
			
			<p style="text-align:center;margin-top:30px;margin-bottom:200px;">Cant find your serial number? Follow our guide <a href="serial_guide.php">here</a>.</p>

			</div>
			
			

			
      		<div class="col-3"></div>
      	</div>
		
		
		
			
		<?php 
	
	if(isset($_POST['search'])) { 
	while($row=$run->fetch_assoc()){ $userId=$row['userId'];
    if($row['status']=='Lost'){ 
		$slct="SELECT * FROM products INNER JOIN users ON products.userId = users.id  WHERE products.userId= '$userId' ";
		 $run2=$db->select($slct);
		 $row2=$run2->fetch_assoc();
	}
	
	
	?>
		
		<div class="row w-75 mx-auto mb-4 shadow border" style="color:grey;" >
			
			<div class="col-sm-4 ">
			<img src="img/product_img/<?php echo $row['image'];?>" alt="" class="d-block mx-auto mt-5 w-75 mx-auto" />
			
			</div>
			
			
			<div class="  col-sm-8">
			<div class="row pb-3" style="">
				<div class="col-sm-4 pl-0"><h6>Serial Number: </h6></div>
				<div class="col-sm-4"><h5><?php echo $row['serial']; ?> </h5></div>
				
				<div class="col-sm-4 text-right">
				
				<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-3 pl-0"><p class="mb-2 font-weight-bold">Status: </p></div>
				<div class="col-sm-8">
				<p class="<?php if($row['status']=='Lost') echo 'text-danger'; else echo 'text-success' ;?> font-weight-bold "><?php echo $row['status']; ?>  </p></div>	
			</div>
			
				</div>
			</div>
		
		<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Name: </p></div>
				<div class="col-sm-8"><p><?php echo $row['pro_name']; ?>  </p></div>	
			</div>
		
		
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Model: </p></div>
				<div class="col-sm-8"><p><?php echo $row['model']; ?>  </p></div>	
			</div>
			
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Make: </p></div>
				<div class="col-sm-8"><p><?php echo $row['make']; ?>  </p></div>	
			</div>
			
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Color: </p></div>
				<div class="col-sm-8"><p><?php echo $row['color']; ?>  </p></div>	
			</div>
			
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Year: </p></div>
				<div class="col-sm-8"><p><?php echo $row['year']; ?>  </p></div>	
			</div>
			
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Cost: </p></div>
				<div class="col-sm-8"><p><?php echo $row['price']; ?>  </p></div>	
			</div>
			
			
			
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Description: </p></div>
				<div class="col-sm-8"><p><?php echo $row['description']; ?>  </p></div>	
			</div>
			
			<?php if($row['status']=='Lost'){ ?>
				
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Contact Email: </p></div>
				<div class="col-sm-8"><p><?php echo $row2['email']; ?>  </p></div>	
			</div>
			<?php } ?>
			
	
			
			
			</div>
		
		</div>
	<?php } if($run->num_rows==0) echo "<p class='m-auto text-center w-100'> No results found! </p>"; }?>
		
		
		
		
      </div>


<?php 

include "footer.php";

?>
