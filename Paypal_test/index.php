<?php 
include_once 'db_connection.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate with Paypal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
</head>
<body class="App">
  <div class="wrapper">
    <div class="w-25 my-5 mx-auto col__box">
        
        <form class="paypal" action="request.php" method="post" id="paypal_form">
          <input type="hidden" name="item_number" value="<?php echo uniqid(); ?>" >
          <input type="hidden" name="item_name" value="<?php  echo uniqid(); ?>" >
          Enter Amount($): <input class="form-control" type="number" name="amount" value="" > 
          <input type="hidden" name="currency_code" value="USD" >
          <input type="submit" class="w-50 my-3 btn btn-success py-2 px-4" name="submit" value="Donate Now" class="btn__default">
        </form>
	    </div>
 
  </div>
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <script>
</body>
</html>