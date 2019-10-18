<?php 
    session_start();
  	$verify = $_POST['verify'];
  	if($_SESSION['captcha_code'] == $verify){
		echo "true";
  	}
	else{
		echo "false";
	}

?>