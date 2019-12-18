



<?php

require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");


$result = mysql_query('SELECT message FROM chat');

$row = mysql_fetch_row($result);

echo "message 1: ", $row[0 ], "<br>\n";

mysql_close($conn);
?>