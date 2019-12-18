<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/conn.php");
echo "<pre>";


if(isset($_GET["chat_id"])){ 

    echo"<p><a href='/'>Back</a></p>";

    $chat_id = $_GET["chat_id"];

    $query = "SELECT *
            FROM chat
             WHERE  chat.id = $chat_id";
    
    if($result = mysqli_query($conn, $query)){
        while($row = mysqli_fetch_assoc($result)){

            echo "<h1>".$row["message"]."</h1>";
            echo"<p>".$row["description"]."</p>";

            //this is where you add the owners inside the while statement
            
            $owner_query = "SELECT lookup.*,
                            owners.names FROM lookup
                            LEFT JOIN owners
                            ON lookup.owner_id = owners.id
                            WHERE lookup.plane_id = $planes_id";

        if($owner_results = mysqli_query($conn, $owner_query)){
            
            echo "<ul>";

        while($owner_row = mysqli_fetch_assoc($owner_results)){

        echo "<li>" . $owner_row["names"]. "<li>";
        }
        echo "</ul>";

    }
            //this is where I end the owners

        }
    }
}

?>