<?php

require_once("header.php");
?>

<div class="container">
    <div class="row">

        <div class="col-12">

            <h1>Members</h1>

        </div>
    <hr>
        <?php

        //offset=($_GET["page] -1) * 10;

        $users_query = "SELECT id, first_name, last_name
         FROM users";

         //you can do this
         // LIMIT 10 OFFSET $OFFSET";

        if($users_result = mysqli_query($conn, $users_query)) {
            while($user_row = mysqli_fetch_array($users_result)){

                ?>


            <div class="col-md-4">
                <div class="card">
                <div class="card-header">
                    <h5>
                        <a href="/profile.php?user_id=<?=$user_row["id"];?>">
                        <?=$user_row["first_name"]. " " .$user_row["last_name"]?>
                        </a>
                    </h5>
                </div>
                </div>
            </div>
            <?php
        }
        } else {
            echo mysqli_error($conn);
        }
        ?>
    </div>
</div>

<?php
require_once("footer.php");

?>