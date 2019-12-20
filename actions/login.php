<?php
require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");

$errors = [];

//if the button action was login
if( isset($_POST["action"]) && $_POST["action"] == "login") :

    //get the user email and password and 
    //connect to user's table and 
    //check if user exists and 
    //password matches
    //if correct, login and  go to index

    if(
    
       (isset($_POST["email"]) && $_POST["email"] != "" ) &&
       (isset($_POST["password"]) && $_POST["password"] != "" )
    
       ){
           $email = $_POST["email"];
           $password = md5($_POST["password"]);

        //connect to dababase
        $query_users = "SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "' LIMIT 1";

        $user_result = mysqli_query($conn,$query_users);

        // echo "<pre>";
        // echo $query_users;
        // print_r($user_result);
        // echo mysqli_num_rows($user_result);
        // exit;

        if ( mysqli_num_rows($user_result) > 0 ) {
            //user found
            while($user = mysqli_fetch_array($user_result)) {

                //need to clear all so to start/set new session
                session_destroy();
                session_start();

                $_SESSION["email"] = $user["email"];
                $_SESSION["first_name"] = $user["first_name"];
                $_SESSION["role"] = $user["role"];
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["profile_pic_id"] = $user["profile_pic_id"];

                header( "Location: http://" . $_SERVER["SERVER_NAME"] );
            }

        } else {
            $errors[] = "Email or Password incorrect.";
        }
    }   else  {
        $errors[] = "Username & Password Required";
    }
        

    //if action is sign up

elseif( isset($_POST["action"]) && $_POST["action"] == "signup") :
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password= md5($_POST["password"]);
    $password2 =md5($_POST["password2"]);
    $address = $_POST["address"];
    $city = $_POST["city"];
    $province=$_POST["province_state"];
    $country = $_POST["country"];
    $postal_code = $_POST["postal_code"];
    $newsletter = $_POST["newsletter"];
    $role = (isset($_POST["role"])) ? $_POST["role"] : 3;
    


// echo "<pre>";
// print_r($_POST);
// print_r($_SERVER);
// exit;


    if($password == $password2 && strlen($password) > 7){
        //continue
            if($email != "" && $first_name != "" && $last_name !=""){
                
                $new_users_query = "INSERT INTO users 
                
                (email, 
                password, 
                last_name, 
                first_name, 
                role, 
                address,   
                city,
                province,
                country, 
                postal_code,
                newsletter)

                VALUES 
                ('$email',
                '$password',
                '$last_name',
                '$first_name',
                $role, 
                '$address',
                '$city',
                '$province',
                '$country',
                '$postal_code',
                $newsletter)";

                if( !mysqli_query($conn, $new_users_query) ){
                    echo mysqli_error($conn);

                } else {

                //log in and go to home page

                $user_id = mysqli_insert_id($conn);

                session_destroy();
                session_start();

                $_SESSION["user_id"] = $user_id;
                $_SESSION["role"] = $role;
                $_SESSION["first_name"] = $first_name;
                $_SESSION["email"] = $email;
                $_SESSION["profile_pic_id"] = $profile_pic_id;

                header("Location: http://". $_SERVER["SERVER_NAME"]);
                }
                //end done

            } else {
                $errors[] = "Please fill out the required fields";
            }
    
    } else {
        $errors[] = "Passwords do not match";
    }


    //if logout button is clicked

elseif( isset($_REQUEST["action"]) && $_REQUEST["action"] == "logout") :
    session_destroy();
    header("Location: http://" . $_SERVER["SERVER_NAME"]);



endif;


if( !empty($errors) ) {


    $query = http_build_query( array("errors"=> $errors));

    header("Location: " . strtok($_SERVER["HTTP_REFERER"], "?"). "?".$query);
//this above line clears the screen back to the page before
}


mysqli_close($conn);
    ?>