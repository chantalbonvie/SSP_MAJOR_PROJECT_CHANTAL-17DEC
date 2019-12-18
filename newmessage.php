

<?php
require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");

$errors = [];


$message = $_POST['message'];
$username = $_SESSION['$username'];

$city = mysqli_real_escape_string($conn, $city);

$sql = "INSERT INTO message (message, username)
VALUE ("$message, $username")";

?>