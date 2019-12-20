<?php
// require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");


  // session_start();
  $_SESSION['usrname'] = strip_tags($_POST['usrname']);
  $_SESSION['color'] = strip_tags($_POST['color']);
  // header("Location: /chat.php");

?>