<?php require_once("header.php"); 
?>
<style>
table, th, td {
    
  border: 1px solid black;
  padding: 50px;
  margin-left: 80px;
  margin-top: 30px;
}

</style>
<?php

$user_id = (isset($_GET["user_id"])) ? $_GET["user_id"] : $_SESSION["user_id"];

$user_query = "SELECT * FROM users WHERE id = " . $user_id;
if ($user_request = mysqli_query($conn, $user_query)):
    while ($user_row = mysqli_fetch_array($user_request)):
        //print_r($user_row);
   
?>


<div class="container">
    <div class="passwordchange">
    <div class="col-12">
    <div class="row">

        <table>
            <tr>
                <td>
            <h4>Change <?php echo $user_row["first_name"]." ".$user_row["last_name"]; ?>'s Password</h4>
            <form action="/actions/edit_user.php" method="POST">
            <?php include($_SERVER["DOCUMENT_ROOT"]."/includes/error_check.php"); ?>
                <input type="hidden" name="user_id" value="<?=$user_row["id"];?>">
                        <div class="form-row mb-2">
                        <div class="row">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        </div>

                    <div class="form-row">
                    <div class="col">
                        <input type="password" name="new_password" placeholder="New password" class="form-control">
                        <br>
                        <input type="password" name="new_password2" placeholder="Confirm New password" class="form-control">
                    </div>
                    </div>

                    <br>
                <?php
                if ($_SESSION["user_id"] == $user_id || $_SESSION["role"] == 1):
                    // * If current user matches profile userid, or if superadmin
                ?>

                <div class="text-right">
                    <a onclick="history.go(-1); "href="#" class="text-link">Cancel</a>
        
                    <button type="submit" tabindex="9" class="btn btn-primary" name="action" value="change_password">Update Password</button>
                </div>
                <?php endif; ?>
            </form>
                </div>
                </td>
                </tr>
        </div>
        </table>
    </div>

<?php

endwhile;

else:
    echo mysqli_error($conn);


endif;
?>
