<?php

require_once("header.php");
//this is the main header different from header so there is no searching site until signed in

?>

<?php
//this is my css to style my login form
?>
<style>

input {
    width: 50%
}

</style>



<?php
    # this can be used to comment
    // just like this can be used to comment
?>
<div class="col-md-12">
<div class="row">
<div class="bgphoto">

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1></H1>
        </div>

        <?php
        echo'<div class="col-12">';
        if(isset($_SESSION["user_id"])):
            echo "<h2>Welcome Back</h2>";
        ?>
            <form action="/actions/login.php" method="post">
                <button type="submit" name="action" value="logout" class="btn btn-alert">
                    Logout
                </button>
            </form> 
        <?php
            else :
        ?>

    <form action="/actions/login.php" method="post">
            <div class="col-md-12">
                <div class="row">
                    <div id="loginstyle">
                        <h2>Already a Member?<br> Sign In</h2><br>
                        <h3>Not a Member<br>
                        <a href="/signup.php" id="signup">Sign Up</a></h3>

                        <?php
                        include($_SERVER["DOCUMENT_ROOT"]. "/includes/error_check.php");
                        ?>
                    </div>
         
                    <div class="login">
                        <div class="form-group">
                            <label for="email address">Email Address</label>
                            <input type="email" name="email" palceholder="Email Address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" palceholder="Password" class="form-control">       
                        </div>  

                        <div class="form-group">
                            <p>
                                <button type="submit" name="action" value="login" class="btn btn-primary">Login</button>
                            </p>
                        </div>  
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
<h3>x</h3>

</div>





<?php

    endif;
    echo '</div>';

?>
</div>




<?php
//practice while loops


?>



<?php
require_once("footer.php");

?>