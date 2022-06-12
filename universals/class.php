<?php  


include "mysql.php";
include "helps.php";


Class Complete{
	
public $db;
	
	public function __construct(){
	$this->db=new Database();
	}
	
	
	public function category($var){
		
		$name=$var['name'];
		$id=$var['id'];
		
		$insert="insert  into category(catName,ID) values('$name','$id')";
		$run=$this->db->insert($insert);
		
		if($run){

		$_SESSION['insert']="Category Inserted Successfullly !";
		header('location:index.php?page=options/addcat'); exit;
	}
	
	}
	
	
	
	public function edit_profile($var){
		
		$name=$var['name'];
	
		$email=$var['email'];
		$password=$var['password'];
		

	
	$up=" UPDATE `users` SET `Name`='$name',`Email`='$email',`Password`='$password'  WHERE `Email`='$email' ";
   
	$run=$this->db->update($up);
	
	if($run==true){
		
		$_SESSION['up']="Informations Updated Successfully !";
		//move_uploaded_file($_FILES['file']['tmp_name'], 'images/'.$photo);
    header('location:index.php?page=profile'); exit;	
	}
		
		
	}
	
	
	
	
	public function editcat ($var){
		
		
		$name=$var['name'];
		$id=$var['id'];
		
		$up="update  category set catName='$name' where ID='$id' ";
		$run=$this->db->update($up);
		
		if($run){

		$_SESSION['insert']="Category Updated Successfullly !";
		header('location:index.php?page=options/mancat'); exit;
	}
	
		
	}
	
	
	
	
	
	public function products($var){
		
		if($var['new']==1)
			$new=1;
		else $new=0;
		
		$name=$var['name'];
		$id=$var['id'];
		$cat_id=$var['cat_id'];
		$price=$var['price'];
		$brand_id=$var['brand_id'];
		$description=$var['description'];
		$image=$_FILES['file']['name'];
		
		$insert="insert  into products(pName,ID,Cat_id,Price,Image,Brand_id,Description,Status) values('$name','$id','$cat_id','$price','$image','$brand_id','$description',$new)";
		$run=$this->db->insert($insert);
		
		if($run){

		$_SESSION['pro']="Product Inserted Successfullly !";
		move_uploaded_file($_FILES['file']['tmp_name'], 'options/images/'.$image);
		header('location:index.php?page=options/addpro'); exit;
	}
	
	}
	
	
	
	
	public function editproduct($var){
		
		
		$name=$var['name'];
		$id=$var['id'];
		$price=$var['price'];
		$category=$var['cat_id'];
		$image=$_FILES['file']['name'];
		$brand_id=$var['brand_id'];
		$description=$var['description'];
		
		if($image==""){
		$up="update  products set pName='$name', Price='$price', Cat_id='$category',Brand_id='$brand_id',Description='$description' where ID='$id' ";
		$run=$this->db->update($up);
		}   
		
		else{
			$up="update  products set pName='$name', Price='$price', Cat_id='$category', Image='$image',Brand_id='$brand_id',Description='$description' where ID='$id' ";
		$run=$this->db->update($up);
		move_uploaded_file($_FILES['file']['tmp_name'], 'options/images/'.$image);
		}   
			
		
		
		if($run){

		$_SESSION['insert']="Informations Updated Successfullly !";
		header('location:index.php?page=options/manpro '); exit;
	}
	
		
	}
	
	
	
	
	
	
	public function addbrand($var){
		
		$name=$var['name'];
		
		$insert="insert  into brands(bName) values('$name')";
		$run=$this->db->insert($insert);
		
		if($run){

		$_SESSION['brand']="Brand Added Successfullly !";
		header('location:index.php?page=options/addbrand'); exit;
	}
	
	}
	
	
	
	public function addtocart($var,$product,$qt){
		
	$pro_name=$product['pName'];
	$pro_id=$product['ID'];
	$price=$product['Price'];
	$image=$product['Image'];
	$ses_id=session_id();
	
	if(isset($var['quantity'])) $quantity=$var['quantity'];
	else $quantity=$qt;
	
	$insert="insert  into cart(Pro_name,Pro_id,Price,Image,Ses_id,Quantity) 
	values('$pro_name','$pro_id','$price','$image','$ses_id','$quantity')";
		
		$sel="select* from cart where Pro_id='$pro_id' AND Ses_id ='$ses_id' "; $res=$this->db->select($sel);
		if($res->num_rows> 0){ if(isset($var['quantity'])) $_SESSION['duplicate']="Product is already in the cart !";
		else { $_SESSION['duplicate']="Product is already in the cart !"; header('location:savelist.php'); exit; } }
		
		
		else {
			$run=$this->db->insert($insert);
		
	     if($run==true){ header('location:cart.php');
		 $_SESSION['addcart']=$pro_name." Added to Cart !"; 
		
		 exit; }
		}
	}
	
	
	
	
	
	
	
	public function savelist($product){
		
	$pro_name=$product['pName'];
	$pro_id=$product['ID'];
	$price=$product['Price'];
	$image=$product['Image'];
	$cus_id=$_SESSION['log_id'];
	
	 $quantity=$_POST['quantity'];
	
	
	
	$insert="insert  into savelist(Pro_name,Pro_id,Price,Image,Cus_id,Quantity) 
	values('$pro_name','$pro_id','$price','$image','$cus_id','$quantity')";
		
		$sel="select* from savelist where Pro_id='$pro_id' AND Cus_id ='$cus_id' "; $res=$this->db->select($sel);
		if($res->num_rows> 0) $_SESSION['duplicate']="Product is already in the savelist !";
		
		else {
			$run=$this->db->insert($insert);
		
	     if($run==true){ header('location:savelist.php');
		 $_SESSION['addcart']=$pro_name." Added to Savelist !"; 
		
		 exit; }
		}
	}
	
	
	
	
	
	
	
	
	
	public function registration($var){
		
		$error=array();
		$name=$email=$country=$address=$password=$phone="";
		
		
		if(empty($var['name']))
		{
			$_SESSION['name_err']= "Name is required !";
			$error['name']= "Name is required !";
			
		}
		
		else
		$name=$var['name'];
	
	
	if(empty($var['email'])){
			$_SESSION['email']= "Email is required !";
			$error['email']= "Email is required !";
	}
	
		else
		{
			if(!filter_var($var['email'], FILTER_VALIDATE_EMAIL)){
				  $error['email']= "Email is invalid !";
				  $_SESSION['email']= "Email is invalid !";
			}
				  
                  else
		          $email=$var['email'];
		}
		
		
		if(empty($var['password'])){
			$error['password']= "Password is required !";
			$_SESSION['password']= "Password is required !";
		}
		
		else{
		$password=$var['password'];
		$password=password_hash($password,PASSWORD_DEFAULT);
		
		
		}
	
	
	if($var['country']=='NULL'){
			$error['country']= "Please select a country !";
			$_SESSION['country']= "Please select a country !";
	}
	
	else{
		$country=$var['country'];
		
		}
	
	
	if(empty($var['address'])){
$error['address']= "Address is required !";
$_SESSION['address']= "Address is required !";

}
		else{
		$address=$var['address'];
		}
	
	
	if(empty($var['phone'])){
  $phone= "No Phone !";

   } 
   else $phone= $var['phone'];
	
	
	//print_r($error);
	
	if(count($error)==0){
		
		
		$email_ck=" select * from visitors  where Email='$email' ";
		
	
			
		if($this->db->select($email_ck)->num_rows > 0) $_SESSION['email']="Email already exists !"; 
		else{
			
			$in="insert into visitors(Name,Email,Password,Country,Address,Phone) values('$name','$email','$password','$country','$address','$phone')";	
			
	        $run=$this->db->insert($in);
		
	    if($run == true) { 
		
		$_SESSION['register']="Registration Successfull !";
		$_SESSION['hash']=$password;
		header('location:login.php');
		exit;
		}
		
			
		}
		
		}
	
	}
	
	
	
	
	
	
	
	public function login($log){
		
		$email=$log['email'];
		$password=$log['password'];
		
		$sel="select * from visitors where Email='$email'";
		$run=$this->db->select($sel);
		$row=$run->fetch_assoc();
		
		
		if($run->num_rows >0){ 
			
			if(password_verify($password,$row['Password']) || $password==$row['Password'] ){
				
				
				if($log['remember']==1){
					setcookie('log_email_visitor',$email,time()+(86400)*30,'/');
					setcookie('log_password_visitor',$password,time()+(86400)*30,'/');
					
				}
				
				
				$_SESSION['login']="You are logged in!";
				$_SESSION['log_id']=$row['ID'];
				
				setcookie('log_cookie','logged',time()+(86400*30),'/');
				setcookie('log_name',$row['Name'],time()+(86400*30),'/');
				setcookie('log_id',$row['ID'],time()+(86400*30),'/');
				
				header('location:login.php'); exit;
				
			}
			else { $_SESSION['p']="Wrong Password"; $_SESSION['log_email_visitor']="$email"; }
		}
		else
		$_SESSION['e']="Invalid Email or Password";
		
	}
	
	
	
	
	
	public function order($var){
		$ses_id=session_id();
		$cus_id=$var['cus_id'];
		
		
		$sel="select * from cart where Ses_id='$ses_id' "; $res=$this->db->select($sel); $c=0; $total_pro=0;
		
		$get_sl="select * from orders"; $last_sl=$this->db->select($get_sl)->num_rows;
		while($row=$res->fetch_assoc()) { 
		
		$last_sl=$last_sl+1;
		$pro_id=$row['Pro_id'];
		$pro_name=$row['Pro_name'];
		$quantity=$row['Quantity'];
		$price=$row['Price']; 
		
		$in="insert into Orders(Cus_id,Pro_id,Pro_name,Quantity,Price,SL) values('$cus_id','$pro_id','$pro_name','$quantity','$price','$last_sl')";	
			
	        $run=$this->db->insert($in);
		
	    if($run == true) { $c=($quantity*$price)+$c;  $total_pro++;  $_SESSION['last_order_id']=$this->db->connect->insert_id;
		
		} }  $c=$c+($c*.1);   $_SESSION['total_pro']=$total_pro;
		
		if($c!=0){  $_SESSION['order']="Order Successfull <small class='pt-1 ml-4 text-dark bg-success'> ($$c payment received) ! </small> "; 
		$del="delete from cart where Ses_id='$ses_id' "; $this->db->delete($del);
		header('location:cart.php'); exit;
		}
		
		
		
		
		
	}
	
	
	
	
	
	
	public function shiporders($min,$max){
		$min_id=$min;
		$max_id=$max;
		
	$up="update orders set Status=1 where (SL<='$max_id' AND SL>='$min_id') ";
	$res=$this->db->update($up); 
	if($res==true) {
		$_SESSION['shipped']="Package Shipped !";
		header('location:index.php?page=options/orders'); exit;
		
	}
		
}





public function searchpro($var){
		
		   $sel="select * from products where pName LIKE '%$var%'";  $res=$this->db->select($sel); return $res;
		   if($res==true){  header('location:products.php'); exit; }

}




}

$all=new Complete();

?>