<?php

require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");

require_once( "config.php" );
  require_once( "/path/to/class/chatClass.php" );
  $id = intval( $_GET[ 'lastTimeID' ] );
  $jsonData = chatClass::getRestChatLines( $id );
  print $jsonData;
?>