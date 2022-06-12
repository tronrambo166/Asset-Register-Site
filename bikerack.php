<?php 

include "header.php";
include "rackCode.php";

	
?>


<!--content start--> 
      <div class="container">  
	  <div class="content mt-4">
	 
	 
	 <div class="row w-75 m-auto">
	 	 		<div class="w-75 float-left">
<h2 class="text-center my-4">Assets</h2>	
<p class="text-center text-mute">

View and manage your assets below.
<br /><br/>
Here you can see the assets you already added also you can register new assets

</p>
			
				</div>

	 
	 		<div class="w-25 float-right"><a href="" onclick="showAddForm(event);" class="btn btn-success rounded">Add New Item</a></div>
<div class="clearfix my-3 "></div>

</div>
			
      	<div class="row">
		
		   <div class="modal-body add_item collapse"> <h2 style="color:#253D5F;"class="w-50 text-center my-4 bg-light mx-auto" >Add New Item</h2>
        
      <div class="hidden_currency w-75 m-auto ">

  <form action="" method="post" enctype="multipart/form-data">
  
<input name="serial" id="input_comp-k9jm74xb1" class="form-control form-group _1SOvY has-custom-focus" type="text" placeholder="Serial Number *" required="" aria-label="Serial Number *" value="">


<input name="name" id="input_comp-k9jm74x21" class=" form-group form-control  _1SOvY has-custom-focus" type="text" placeholder="Item name *" required="" aria-label="Make *" value="">

<input name="make" id="input_comp-k9jm74x21" class=" form-group form-control  _1SOvY has-custom-focus" type="text" placeholder="Make *" required="" aria-label="Make *" value="">
<input name="model" id="input_comp-k9jm74x42" class=" form-group form-control _1SOvY has-custom-focus" type="text" placeholder="Model(optional)" aria-label="Model" value="">
<input name="colour" id="input_comp-kac2j81s" class=" form-group form-control _1SOvY has-custom-focus" type="text" placeholder="Colour(optional)" aria-label="Colour" value="">
<input name="year" id="input_comp-k9jm74x7" class=" form-group form-control _1SOvY has-custom-focus" type="number" placeholder="Year(optional)"  max="2021" aria-label="Year" value="">
<input name="cost" id="input_comp-k9jm74x9" class=" form-group form-control _1SOvY has-custom-focus" type="number" placeholder="Cost(optional)"  aria-label="Cost" value="">



<label for="textarea_comp-kac56qts" class=" form-group form-control  _20uhs"></label>

<textarea name="description" id="textarea_comp-kac56qts" class="mb-5 form-group  form-control _1VWbH has-custom-focus" placeholder="Item details(optional)"></textarea>

  <b>Add Image:</b> <input name="image" type="file" /> <input name="addItem" type="submit" class="w-25 btn m-auto btn-primary" value="Upload Item" />
    
	</form>
		
	
      	</div>
		
		</div>
		
		</div>
		
		<div class="clearfix my-5 "></div>
		
		<h3 class="text-center bg-success w-75 py-2 m-auto">Your Assets</h3> <div class="my-2"><hr></div>
		
		<?php  if(isset($_SESSION['userId'] )) { $userId=$_SESSION['userId'];
	$sel="select * from products where userId='$userId' ";
	$run=$db->select($sel);
	while($row=$run->fetch_assoc()){  ?>
		
		<div class="row w-75 mx-auto mb-4" style="color:grey;" >
			
			<div class="col-sm-4 bg-light">
			<img src="img/product_img/<?php echo $row['image'];?>" alt="" class="d-block mx-auto mt-5 w-75 mx-auto" />
			
			</div>
			
			
			<div class="bg-light  col-sm-8">
			<div class="row pb-3" style="">
				<div class="col-sm-4 pl-0"><h6>Name: </h6></div>
				<div class="col-sm-3"><h5><?php echo $row['pro_name']; ?> </h5></div>
				
				<div class="col-sm-5 text-right">
				
				<?php if($row['status']=='Lost'){ ?>
				<a data-toggle="modal" data-target="#found<?php echo $row['id']; ?>" href="" class=" font-weight-bold d-inline px-1 text-success">Found?
				
				</a>
				
				<?php } else{ ?>
				<a data-toggle="modal" data-target="#stolen<?php echo $row['id']; ?>" href="" class=" font-weight-bold d-inline px-1 text-danger">Lost?
				</a>
				<?php } ?>
				
				
				<a data-toggle="modal" data-target="#editItem<?php echo $row['id']; ?>" href="" class=" font-weight-bold d-inline px-1  font-weight-bold  text-success">Edit
				</a>
				
				<a onclick="return confirm('Are you sure to delete?')" href="delete.php?proid=<?php echo base64_encode($row['id']); ?>&image=<?php echo $row['image']; ?>" class=" font-weight-bold d-inline  px-1  text-success">
				Remove</a>
				
				</div>
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
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Serial: </p></div>
				<div class="col-sm-8"><p><?php echo $row['serial']; ?>  </p></div>	
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
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Status: </p></div>
				<div class="col-sm-8">
				<p class="<?php if($row['status']=='Missing') echo 'text-danger';?> font-weight-bold "><?php echo $row['status']; ?>  </p></div>	
			</div>
			
			<div class="row pb-0" style="font-size:14px;">
				<div class="col-sm-4 pl-0"><p class="mb-2 font-weight-bold">Description: </p></div>
				<div class="col-sm-8"><p><?php echo $row['description']; ?>  </p></div>	
			</div>
			
	
			
			
			</div>
		
		</div>
		
		
		
	
		 <!--Hidden Modal-->
	   <div  class="modal fade" id="editItem<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
		
	  	   <div class="modal-body "> <h2 style="color:#253D5F;"class="w-50 text-center my-4 bg-light mx-auto" >Edit</h2>
        
      <div class="hidden_currency w-100 m-auto ">

	  <form action="" method="post" enctype="multipart/form-data" >
	  <input name="pro_id" type="number" hidden value="<?php echo $row['id']; ?>" />
  
<input name="serial" id="input_comp-k9jm74xb1" class="form-control form-group _1SOvY has-custom-focus" type="text" placeholder="Serial Number *" required="" aria-label="Serial Number *" value="<?php echo $row['serial']; ?>">


<input name="name" id="input_comp-k9jm74x21" class=" form-group form-control  _1SOvY has-custom-focus" type="text" placeholder="Item name *" required="" aria-label="Make *" value="<?php echo $row['pro_name']; ?>">

<input name="make" id="input_comp-k9jm74x21" class=" form-group form-control  _1SOvY has-custom-focus" type="text" placeholder="Make *" required="" aria-label="Make *" value="<?php echo $row['make']; ?>">
<input name="model" id="input_comp-k9jm74x42" class=" form-group form-control _1SOvY has-custom-focus" type="text" placeholder="Model(optional)" aria-label="Model" value="<?php echo $row['model']; ?>">
<input name="color" id="input_comp-kac2j81s" class=" form-group form-control _1SOvY has-custom-focus" type="text" placeholder="Colour(optional)" aria-label="Colour" value="<?php echo $row['color']; ?>">
<input name="year" id="input_comp-k9jm74x7" class=" form-group form-control _1SOvY has-custom-focus" type="number" placeholder="Year(optional)" min="0" max="2021" aria-label="Year" value="<?php echo $row['year']; ?>">
<input name="cost" id="input_comp-k9jm74x9" class=" form-group form-control _1SOvY has-custom-focus" type="number" placeholder="Cost(optional)" min="0" aria-label="Cost" value="<?php echo $row['price']; ?>">



<label for="textarea_comp-kac56qts" class=" form-group form-control  _20uhs"></label>

<textarea name="description" id="textarea_comp-kac56qts" class="mb-5 form-group  form-control _1VWbH has-custom-focus" placeholder="Item details(optional)"><?php echo $row['description']; ?></textarea>

  <b>Change Image:</b> <input name="image" type="file" /> <input name="updateItem" type="submit" class="w-25 btn my-3 float-right mx-auto btn-primary" value="Update" />
    
	
	</form>
	
      	</div>
		
		</div>
		
		</div>
		</div>
		</div>
	 
	  <!--Hidden Modal-->
	  
	  	
		
		
		
			
		 <!--Stolen Modal-->
	   <div  class="modal fade" id="stolen<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
		
	  	   <div class="modal-body "> <h2 style="color:#253D5F;"class="px-1 py-2 w-50 text-center my-4 bg-light mx-auto" >Report Missing</h2>
        
      <div class="hidden_currency w-100 m-auto ">

	  <form action="" method="post" enctype="multipart/form-data" >
	  <input name="pro_id" type="number" hidden value="<?php echo $row['id']; ?>" />
  
<input name="date" id="input_comp-k9jm74xb1" class="form-control form-group _1SOvY has-custom-focus" type="date" placeholder="Serial Number *" required="" aria-label="Serial Number *" value="">


<input name="time" id="input_comp-k9jm74x21" class=" form-group form-control  _1SOvY has-custom-focus" type="text" placeholder="Item name *" required="" aria-label="Make *" value="<?php echo date("h:i a") ?>">




<textarea name="description" id="textarea_comp-kac56qts" class="mb-5 form-group  form-control _1VWbH has-custom-focus" placeholder="description..."><?php echo $row['description']; ?></textarea>

 <!-- <b>Change Image:</b> <input name="image" type="file" /> --> <input name="stolen" type="submit" class="w-25 btn my-3 float-right mx-auto btn-danger" value="Report" />
    
	
	</form>
	
      	</div>
		
		</div>
		
		</div>
		</div>
		</div>
	 
	  <!--Stolen Modal-->
	  
	  	
		
		
		 <!--Found Modal-->
	   <div  class="modal fade" id="found<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
		
	  	   <div class="modal-body "> <h2 style="color:#253D5F;"class="px-3 py-2 w-50 text-center my-4 bg-light mx-auto" >Close Report</h2>
        
      <div class="hidden_currency w-100 m-auto ">

	  <form action="" method="post" enctype="multipart/form-data" >
	  <input name="pro_id" type="number" hidden value="<?php echo $row['id']; ?>" />
  
<p class="text-center">Did you find your bike? please give us details of what happened</p>

<textarea name="description" id="textarea_comp-kac56qts" class="mb-5 form-group  form-control _1VWbH has-custom-focus" placeholder="details..."><?php echo $row['description']; ?></textarea>

 <!-- <b>Change Image:</b> <input name="image" type="file" /> --> <input name="found" type="submit" class="w-25 btn my-3 float-right mx-auto btn-danger" value="Report" />
    
	
	</form>
	
      	</div>
		
		</div>
		
		</div>
		</div>
		</div>
	 
	  <!--Found Modal-->
		
		
		
		
		
		<?php } }?>
		
		
		
		
		</div>
      </div>
	  
	  
	 
	  
	  
<!--use animation here-->
	<div style="margin-top:30px;"></div>

<!--search box-->
	 
<script type="text/javascript">
function showAddForm(e){
	e.preventDefault();
	$('.add_item').show();
	
}


</script>

<?php 

include "footer.php";

?>
