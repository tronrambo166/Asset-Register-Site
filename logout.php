<?php   
session_start();
session_destroy();

	//setcookie('log','logged',time()-(86400),'/');
	//setcookie('logstd','logged',time()-(86400),'/');

header('location:login.php');



?>