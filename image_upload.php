<?php
require_once("header.php");

$msg = "";

//when I press the upload button

if(isset($_POST["upload"]) ) {
    //find a place to store uploaded images where you get call on them
    $target = "image".basename($_FILES['image']['name']);
    //connect to the database, maybe can be at bottom of page?
    $db = mysqli_connect("localhost",  "root", "", "photos");

    //need to get the submitted information all of it
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $sql = "INSERT INTO image_upload (image, text) VALUES ('$image', '$text')";
    mysqli_query($db, $sql); 
        // the above is to store the data into a table named 
        if(moved_uploaded_files($_FILES['tmp_name']['name'], $target)){
            $msg = "Check Out This Great Stamp";
        }else{
            $msg = "Sorry there is a problem with this stamp";
        }
}   


?>
    <div id="content">

<?php
$db = mysqli_connect("localhost", "root", "", "photos");
$sql = "SELECT * FROM images";
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "<div id='img_div'>";
        echo "<img src=' " .$row['image']. "' >"
        echo "<p>".$row['text']."</p>";
        echo  "</div>";
}
?>

        <form method="post" action="/stamp_image_card.php" enctyp="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" cols="40" row="4"  placeholder="Write about this amazing stamp . . . "></textarea>
            </div>
            <div>
                <input type="submit" name="uplaod" value="upload_image">
            </div>
        </form>
    </div>




<?php
require_once("footer.php");
?>