<?php


require_once("header.php");

$user_id = ( isset($_GET["user_id"]) ) ? $_GET["user_id"] : $_SESSION["user_id"];

$user_query = "SELECT users.* FROM users
                WHERE users.id = ". $user_id;

if( $user_request = mysqli_query($conn, $user_query) ) :
    while ($user_row = mysqli_fetch_array($user_request)) :


?>

<div class="container">

    <div class="row">
        <div cilass="col-12">
        <?php
        include($_SERVER["DOCUMENT_ROOT"]."/includes/error_check.php");
        ?>
        <h1><?php echo $user_row["first_name"] . " " . $user_row["last_name"];?> </h1>
        <p>
            <?=$user_row["address"];?> <br>

            <?=$user_row["city"] . ", " . $user_row["province"];?> <br>

           <?=$user_row["postal_code"];?>
        </p>
        <p>
            <?=$user_row["email"];?>

        </p>
        <p>

        </p>




        <hr>
        <?php
        if($_SESSION["user_id"] == $user_id || $_SESSION["role"] == 1):
        ?>
        <div class="btn-group">
            <a href="/edit_profile.php?user_id=<?=$user_row["id"];?>" class="btn btn-outline-primary">Edit Profile</a>
        </div>
        <?php
            endif;
        ?>

    </div>
</div>

</div>

</div>

<?php

endwhile;

else :
    echo mysqli_error($conn);
   
endif;

require_once("footer.php");
?>