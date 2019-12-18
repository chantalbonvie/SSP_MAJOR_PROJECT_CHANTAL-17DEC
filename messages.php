
 <?php

require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");

$errors = [];
?>

<meta http-equiv="refresh">

<?php


mysqli_select_db($conn, posting_den);

$query = "SELECT * FROM chat";
 if($result = mysqli_query($conn, $query)){
  
     while($row = mysqli_fetch_row($results)){
     
     echo $row['3']. ' says: '.$row['2']. '<br>';
 }
 mysqli_free_result(result);
}

echo rand(1,100);



?>