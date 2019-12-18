<?php
require_once("header.php");

//print_r($_SESSION);

?>


<?php
    # this can be used to comment
    // just like this can be used to comment
?>


<div class="container">
    <div class="row">
        <div class="col-12">
        </div>
        <?php

        echo'<div class="col-12">';
        if(isset($_SESSION["user_id"])):
            echo "<h3>Welcom Back</h3>";
        ?>
            <form action="/actions/login.php" method="post">
                <button type="submit" name="action" value="logout" class="btn btn-warning">
                    Logout
                </button>
            </form> 
        <?php
            else :
        ?>

        <form action="/actions/login.php" method="post" class="col">

        <h2>Login</h2>

            <?php

            include($_SERVER["DOCUMENT_ROOT"]. "/includes/error_check.php");

            ?>

            <div class="form-group">
            <input type="email" name="email" palceholder="Email Address" class="form-control">
            </div>

            <div class="form-group">
            <input type="password" name="password" palceholder="Password" class="form-control">          
            </div>  

            <div class="form-group">
            <p>
            <button type="submit" name="action" value="login" class="btn btn-primary">Login</button>
            </p>

            <p>
            <a href="/signup.php">Create Signup</a>
            </p>


        </div>
<?php

    endif;
    echo '</div>';

?>
</div>




<?php
require_once("footer.php");


?>