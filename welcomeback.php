<?php
if (!isset($_SESSION["user_id"])) {
    header("Location: http://".$_SERVER["SERVER_NAME"]);
}

require_once("header.php");

?>

<div class="col-md-12">
<div class="row">

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1></h1>
        </div>

        <?php
        echo'<div class="col-12">';
        if(isset($_SESSION["user_id"])):
            ?>
            <h2>
            <div class='chip'>
            <img src="#" alt="Person" width="96" height="96">
            Welcome back <?=$_SESSION["first_name"]?>
            </div>
            </h2>
            
            <form action="/actions/login.php" method="post">
                <button type="submit" name="action" value="logout" class="btn btn-alert">
                    Logout
                </button>
            </form> 

        <?php
            else:
        ?>

    <form action="/actions/login.php" method="post">
            <div class="col-md-12">
                <div class="row">
                    <div id="loginstyle">
                        <h2>Already a Member?<br> Sign In</h2><br>
                        <h3>If You Are Not Already A Member 
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
</div>




<?php
endif;
require_once("footer.php");

?>