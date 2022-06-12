<?php


	if(isset($_POST['addItem'])){
		$userId=$_SESSION['userId'];
		$pro_name=$_POST['name'];
		$serial=$_POST['serial'];
		$make=$_POST['make'];
		$price=$_POST['cost'];
		if($price==0) $price='N/A';
		$model=$_POST['model'];
		if($model=='') $model='N/A';
		$color=$_POST['color']; 
		if($color=='') $color='N/A';
		$year=$_POST['year'];
		if($year==0) $year=2021;
		$description=$_POST['description'];
		if($description==0) $description='N/A';
		$image=$_FILES['image']['name']; //echo 'lll'.$image; exit;

		$insert="insert  into products(userId,pro_name,serial,make,price,model,color,year,description,image)
		values('$userId','$pro_name','$serial','$make','$price','$model','$color','$year','$description','$image')";
		$run=$db->insert($insert);
		
		if($run){

		$_SESSION['success']="Product Inserted Successfullly !";
		move_uploaded_file($_FILES['image']['tmp_name'], 'img/product_img/'.$image);
		header('location:bikerack.php'); exit;
		
		}
		
	}
	
	
	
	
	if(isset($_POST['updateItem'])){
		$pro_id = $_POST['pro_id'];
		$pro_name=$_POST['name'];
		$serial=$_POST['serial'];
		$make=$_POST['make'];
		$price=$_POST['cost'];
		if($price==0) $price='N/A';
		$model=$_POST['model'];
		if($model=='') $model='N/A';
		$color=$_POST['color']; 
		if($color=='') $color='N/A';
		$year=$_POST['year'];
		if($year==0) $year=2021;
		$description=$_POST['description'];
		if($description==0) $description='N/A';
		$image=$_FILES['image']['name']; 
		
		if($image=='') {
		$insert="update  products set pro_name='$pro_name' ,serial='$serial' ,make='$make' ,price='$price' ,
		model= '$model',color='$color' ,year= '$year',description= '$description' where id='$pro_id' ";
		}
		else { 
		$sel="select image from products where id = '$pro_id'"; $run=$db->select($sel); $curr_row=$run->fetch_assoc();
		unlink('img/product_img/'.$curr_row['image']); 
		
			$insert="update products set pro_name='$pro_name' ,serial='$serial' ,make='$make' ,price='$price' ,
		model= '$model',color='$color' ,year= '$year',description= '$description',image='$image' where id='$pro_id' ";
		}
		
		$run=$db->insert($insert);
		
		if($run){

		$_SESSION['success']="Info Updated!";
		move_uploaded_file($_FILES['image']['tmp_name'], 'img/product_img/'.$image);
		header('location:bikerack.php'); exit;
		
		}
		
	}
	
	
	
	
		if(isset($_POST['stolen'])){
		$userId=$_SESSION['userId'];
		$pro_id = $_POST['pro_id'];	
		$date = $_POST['date'];
		$time = $_POST['time'];
		$description=$_POST['description'];
		$missing='Lost';
		
		$up="update products set status='$missing' where id='$pro_id' ";	
		$run1=$db->insert($up); 
		
		$ck_id="select * from stolen where product_id='$pro_id' "; $run=$db->select($ck_id);
		if($run->num_rows >0) {} else {
		
		$insert="insert  into stolen(product_id,date,time,description)
		values('$pro_id','$date','$time','$description')";
		$run2=$db->insert($insert);
		}
		
		if($run1){
		$_SESSION['success']="Missing report submitted!";
		header('location:bikerack.php'); exit;
		
		}
		
	}
	
	
	if(isset($_POST['found'])){
		$userId=$_SESSION['userId'];
		$pro_id=$_POST['pro_id'];
		//$description=$_POST['description'];
		
		
		$up="update products set status='Safe' where id='$pro_id' ";	
		$run1=$db->insert($up); 
	
		if($run1){
		$_SESSION['success']="Close report submitted!";
		header('location:bikerack.php'); exit;
		
		}
		
	}
	

?>