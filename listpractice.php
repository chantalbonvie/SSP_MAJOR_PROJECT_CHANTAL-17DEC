<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/conn.php");
echo "<pre>";
?>
<link href="/css/styles.css" rel="stylesheet" type="text/css">

<?php

$query = "SELECT * FROM  users";

if($result = mysqli_query($conn, $query)){

    echo '<p>User Names and Role</p>';
    echo"<ol>";

    while($row = mysqli_fetch_assoc($result)){
        echo $row['first_name'] . " "  . $row['last_name'];


        if( $row["role"] == 1 ){
            echo " Sup Admin";

        } else if(["role"] >= 2) {
            echo " Regular User";
        }
        echo "<br>";
    }

    echo "</ol>";

} else{

    echo "<p>" . mysqli_error($conn) . "</p>";
}
?>
