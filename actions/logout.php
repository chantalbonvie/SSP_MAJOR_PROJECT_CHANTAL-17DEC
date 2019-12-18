<?php

require_once("header.php");

	session_start();
 
	session_destroy();
	header('location:index.php');
 

require_once("footer.php");

?>