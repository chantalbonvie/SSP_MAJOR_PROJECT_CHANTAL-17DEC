<?php
require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");

$errors = [];

//if the button action was login

  session_start();
  $_SESSION['usrname'] = strip_tags($_POST['usrname']);
  $_SESSION['color'] = strip_tags($_POST['color']);
  // header("Location: /chat.php");

?>