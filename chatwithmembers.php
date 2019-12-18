<?php

require_once("header.php");


SESSION_START();

?>

<div class="chats">

<form action="/chatroom.php" method="POST">
<p>Please enter you name below:</p>
<input type="text" name="username"/>
<input type="submit" name="Enter" />



</div>


<?php
require_once("footer.php");

?>