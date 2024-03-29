<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/conn.php");

/**
 * ! must be logged in
 * ? role is less than 3 aka: 3=user 2=editor 1=superadmin
 * article published under current user
 * * take us back to users articles
 */

session_start();

$errors = [];

if (isset($_SESSION["user_id"]) && ($_SESSION["role"] < 3)):

    $user_id        = $_SESSION["user_id"];
    $title          = htmlspecialchars($_POST["title"], ENT_QUOTES);
    $content        = htmlspecialchars($_POST["content"], ENT_QUOTES);
    $date_created   = date("Y-m-d H:i:s");

    if (isset($_FILES["featured_image"]) && $_FILES["featured_image"]["error"] == 0) {
        if (
            ($_FILES["featured_image"]["type"] == "image/jpeg" || 
            $_FILES["featured_image"]["type"] == "image/jpg"   ||
            $_FILES["featured_image"]["type"] == "image/png"   ||
            $_FILES["featured_image"]["type"] == "image/gif")  &&
            $_FILES["featured_image"]["size"] <= 3000000
        ) {

            $file_name = $_SERVER["DOCUMENT_ROOT"]."/uploads/".$_FILES["featured_image"]["name"];
            // Check if file exists
            if (!file_exists($file_name)
            ) {
                // upload to uploads folder

                if (move_uploaded_file($_FILES["featured_image"]["tmp_name"], ($file_name))) {
                    $insert_image_query = "INSERT INTO images (url, owner_id) VALUES ('".str_replace($_SERVER["DOCUMENT_ROOT"], "", $file_name)."', $user_id)";

                    if(mysqli_query($conn, $insert_image_query)) {

                        $featured_image_id = mysqli_insert_id($conn);
                    } else {
                    }

                }

            } else {
                $errors[] = "File already exists";
            }

        } else {
            $errors[] = "Incorrect File Type";
        }
        
    } else {
        $featured_image_id = 'NULL';
    }
    
    if ($title != "" && $content != "") {

        $query = "INSERT INTO articles (title, content, image_id, author_id, date_created, date_modified) VALUES ('$title', '$content', $featured_image_id, $user_id, '$date_created', '$date_created')";

        if (mysqli_query($conn, $query)) {

            $article_id = mysqli_insert_id($conn);
            header("Location: http://".$_SERVER["SERVER_NAME"]."/articles.php?id=".$article_id);

        } else {
            $errors[] = "Something went wrong: " . mysqli_error($conn);
        }

    } else {
        $errors[] = "Please fill in all fields";
    }

else:
    header("Location: http://".$_SERVER["SERVER_NAME"]);
endif;


if (!empty($errors)) {
    $query = http_build_query(array("errors" => $errors));
    header("Location: " . strtok($_SERVER["HTTP_REFERER"], "?") . "?" . $query);

}

?>
