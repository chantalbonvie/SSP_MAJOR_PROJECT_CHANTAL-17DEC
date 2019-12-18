<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/conn.php");


session_start();

$errors = [];

if(isset($_POST["action"]) && $_POST["action"] == "update") :

    if( isset($_SESSION["user_id"]) && ($_SESSION["user_id"] == $_POST["user_id"] || $_SESSION["role"] == 1) ) {

        $user_id = $_POST["user_id"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $province = $_POST["province"];

        if($first_name == '' || $last_name == ''){
            $errors[] = 'Fields cannot be empty';

        } else {


            $update_query = "UPDATE users 
                            SET first_name = '$first_name',
                                last_name= '$last_name',
                                email='$email',
                                password='password',
                                address= '$address',
                                city='$city',
                                province='$province'
                                

                                WHERE id = $user_id" ;

            if(  mysqli_query($conn, $update_query) ) {


                header("Location:" . strtok($_SERVER["HTTP_REFERER"], "?") . "?user_id=" .$user_id . "&success=User+Updated");
            } else {
                $errors[] = mysqli_error($conn);
            }

        }

    } else {

        $errors[] = "You do not have permission.";
    }


 elseif ( isset($_POST["action"]) && $_POST["action"] == "delete") :

    $user_id = $_POST["user_id"];
    $delete_query = "DELETE FROM users WHERE id = 
    $user_id";

    $select_query = "SELECT * FROM users WHERE id = $user_id";

    if($user_result = mysqli_query($conn, $select_query)){
        while($user_row = mysqli_fetch_array($user_result)){
            if($user_row["role"] != 1){
                //if user role is not 1 (the super admin)
                if(mysqli_query($conn, $delete_query)){
                    if($user_row["id"] == $_SESSION["user_id"]){
                        session_destroy();
                        header("Location: http://" . $_SERVER["SERVER_NAME"]);
                    } else {
                        header("Location: http://" . $_SERVER["SERVER_NAME"] . "/members.php");
                    }
                } else {
                    $errors[] = mysqli_error($conn);
                }

            
            } else {
                $errors[] = "Cannot Delete Super Admin:";
            }
        }
    } else{
        $errors[] = "User does not exists: " .mysqli_error($conn);
    }


elseif(isset($_POST["action"])&& $_POST["action"] == "change_password") :

        //Select current user and check passord matches
        //get new passwords and check if they match
        //update password for user
        $user_id            = $_POST["user_id"];
        $current_password   = md5($_POST["password"]);
        $new_password       = md5($_POST["new_password"]);
        $new_password2      = md5($_POST["new_password2"]);
        $select_query       = "SELECT * FROM users
                                 WHERE id = $user_id AND password = '$current_password'";
        $select_result = mysqli_query($conn, $select_query);
    if(mysqli_num_rows($select_result) > 0) {
        if($new_password == $new_password2){
                $update_query = "UPDATE users SET password = '$new_password' WHERE id = $user_id ";

                    if(mysqli_query($conn, $update_query)){
                        header("Location: http://" . $_SERVER["SERVER_NAME"] . "/profile.php?success=Password+Reset");

                    } else {
                            $errors[] = "Something is wrong:" . myssqli_error($conn);
                    }


        }else {
            $errors[] = "New Passwords do not match";

        }

    }else {
        $errors[] = "Current password is incorrect " . mysqli_error($conn);
    }

endif;

if( !empty($errors) ) {


    $query = http_build_query( array("errors"=> $errors));

    header("Location: " . strtok($_SERVER["HTTP_REFERER"], "?"). "?user_id=" . $user_id . "&" .$query);
    //this above line clears the screen back to the page before
}



?>