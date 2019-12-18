

<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/conn.php");
echo "<pre>";
?>
<link href="/css/styles.css" rel="stylesheet" type="text/css">

<?php

$query = "SELECT * FROM member_favorite_stamp";

if($result = mysqli_query($conn, $query)){
    echo '<p>Stamp Id, Comments and Member Id</p>';
    echo"<ul>";

    while($row = mysqli_fetch_assoc($result)){
        echo "<li>
        <a href='/memberfavorite.php?stamp_id=".$row["stamp_id"]."'>".$row["stamp_id"].$row["comment"]."</a>
        </li>";
    }
    echo "</ul>";

} else{

    echo "<p>" . mysqli_error($conn) . "</p>";
}


?>
<br>
<?php

$query = "SELECT * FROM  users";

if($result = mysqli_query($conn, $query)){
   
    echo '<p>Members</p>';
    echo"<ol>";
    
        while($row = mysqli_fetch_assoc($result)){
            echo "<li>" . $row["first_name"] . "</li>";
        }
        echo "</ol>";

} else{
    echo "<p>" . mysqli_error($conn) . "</p>";

}

?>
