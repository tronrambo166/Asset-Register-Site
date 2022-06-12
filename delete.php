
<?php    session_start();
include "universals/sessions.php";
include "universals/class.php";



// Delete: Product

if(isset($_GET['proid']) ){

$id=$_GET['proid']; 
$id = base64_decode($id);
$image=$_GET['image'];



$del=" delete from products where id='$id' ";
$run=$db->delete($del);


if($run==true){
	unlink('img/product_img/'.$image);
	
	$_SESSION['success']="Deleted Successfully";	
	header('location:bikerack.php'); exit;
}

}	





// Delete: Category

if(isset($_GET['cid'])){

$id=$_GET['cid'];

$del=" delete from category where ID='$id' ";
$run=$db->delete($del);

if($run==true){
	
	$_SESSION['del']="Deleted Successfully";
	header('location:../index.php?page=options/mancat'); exit;
}
}	
	
	



// Delete:Brand

if(isset($_GET['bid'])){
$id=$_GET['bid'];

$del=" delete from brands where ID='$id' ";
$run=$db->delete($del);

if($run==true){
	
	$_SESSION['delbrand']="Deleted Successfully";
	header('location:../index.php?page=options/manbrand'); exit;
}

}		
	

?>

