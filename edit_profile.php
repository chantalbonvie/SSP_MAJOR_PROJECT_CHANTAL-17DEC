<?php require_once("header.php"); 
?>
<?php

$user_id = (isset($_GET["user_id"])) ? $_GET["user_id"] : $_SESSION["user_id"];

$user_query = "SELECT * FROM users WHERE id = " . $user_id;

if ($user_request = mysqli_query($conn, $user_query)):
    while ($user_row = mysqli_fetch_array($user_request)):
   
?>

<div class="container">
    <div class="clientedit">
        <div class="col-12">
            <div class="row">

                <h3>Editing <?php echo $user_row["first_name"]." ".$user_row["last_name"]; ?></h3>
                <form action="/actions/edit_user.php" method="POST">
                <?php include($_SERVER["DOCUMENT_ROOT"]."/includes/error_check.php"); ?>
                    <input type="hidden" name="user_id" value="<?=$user_row["id"];?>">
                    <div class="form-row my-3">
                        <div class="col">
                            <input type="text" tabindex="1" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="<?=$user_row["first_name"];?>">
                        </div>
                        <div class="col">
                            <input type="text" tabindex="2" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="<?=$user_row["last_name"];?>">
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col">
                            <input type="text" tabindex="3" name="address" id="address" class="form-control" placeholder="Address 1" value="<?=$user_row["address"];?>">
                        </div>
                    </div>

                    <div class="form-row my-3">
                        <div class="col">
                            <input type="text" tabindex="5" name="city" id="city" class="form-control" placeholder="City" value="<?=$user_row["city"];?>">
                        </div>
                        <div class="col">
                            <input name="province" tabindex="6" class="form-control" placeholder="Province" value="<?=$user_row["province"]?>">
                        </div>
                        <div class="col">
                            <input type="text" tabindex="7" name="postal_code" id="postal_code" class="form-control" placeholder="Postal Code" value="<?=$user_row["postal_code"];?>">
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col">
                            <input type="email" tabindex="8" name="email" id="email" class="form-control" placeholder="Email" value="<?=$user_row["email"];?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                    <?php
                    if ($_SESSION["user_id"] == $user_id || $_SESSION["role"] == 1):
                        // * If current user matches profile userid, or if superadmin
                    ?>
                    <div class="col">
                        <button type="submit" tabindex="9" class="btn btn-primary" name="action" value="update">Update Profile</button>
                        <a href="/reset_password.php" tabindex="9" class="btn btn-primary" >Change Password</a>


                    <div class="col text-right">
                    <button type="submit" class="btn btn-text text-danger" name="action" value="delete">Delete Profile</button>

                    <?php endif;
                    ?>

                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<?php
endwhile;
else:
    echo mysqli_error($conn);
endif;
?>
