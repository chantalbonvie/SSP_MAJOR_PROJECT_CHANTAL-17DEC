<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/conn.php");


session_start();

$errors = [];

if (isset($_SESSION["user_id"]) && ($_SESSION["role"] < 3)):

    $user_id        = $_SESSION["user_id"];

 $stamp_id         = $_POST["stamp_id"];

    $comment       = htmlspecialchars($_POST["comment"], ENT_QUOTES);

$favorite_query = "INSERT INTO member_favorite_stamp (stamp_id, comment, member_id) 
VALUES ($stamp_id, '$comment', $user_id)";

if (mysqli_query($conn, $favorite_query)){
        header ("Location: http://".$_SERVER["SERVER_NAME"]);
     }


endif;


if (!empty($errors)) {
    $query = http_build_query(array("errors" => $errors));
    header("Location: " . strtok($_SERVER["HTTP_REFERER"], "?") . "?" . $query);

}

?>
