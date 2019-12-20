<?php

require_once("header.php");


?>
<div class="container">
    <div class="row">

        <?php
        echo'<div class="col-12">';
        if(isset($_SESSION["user_id"])):
            ?>          
            <div class='chip'>

            <h4><br> Welcome to The Posting Den </h4><br>
            <h6>Members - Favorite Stamps and Comments</h6>

                <form action="/actions/edit_user.php" method="POST">
  
<?php
function make_query($conn)
{
 $query = "SELECT * FROM  browse_carousel ORDER BY id ASC";
 $result = mysqli_query($conn, $query);
 return $result;
}

function make_slide_indicators($conn)
{
 $output = ''; 
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($conn)
{
 $output = '';
 $count = 0;
 $result = make_query($conn);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="carousel-item active">';
  }
  else
  {
   $output .= '<div class="carousel-item">';
  }
  $output .= '
   <img src="'.$row["stamp_image"].'"width="330" height="370" alt=Stamp_Images"'.$row["country"].'" />
   <div class="carousel-caption">
    <h3>'.$row["country"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>

<div class="container">
    <div class="col-md-12">

            <?php
            $query = "  SELECT member_favorite_stamp.*, 
                               users.first_name,
                               users.last_name,
                               browse_carousel.stamp_image
                        FROM member_favorite_stamp
                        LEFT JOIN users
                        ON users.id = member_favorite_stamp.member_id
                        LEFT JOIN browse_carousel
                        ON browse_carousel.id = member_favorite_stamp.stamp_id
                        ORDER BY member_favorite_stamp.id DESC" ;

if($result = mysqli_query($conn, $query)){
    echo '<p></p>';

    
    echo '<div class="row">';
    while($row = mysqli_fetch_assoc($result)){
        $user_name = $row["first_name"]." ".$row["last_name"];
        ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="<?=$row["stamp_image"]?>" alt="" class="card-img-top">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>"<?=$row["comment"]?>"</p>
                        <footer class="blockquote-footer"><?=$user_name?></footer>
                    </blockquote>
                </div>
            </div>
        </div>

        <?php
    }
    echo '</div>';

} else{

    echo "<p>" . mysqli_error($conn) . "</p>";
}

?>

      </div>
    </div>
  </div>
</div>
</div>

<?php
    else :
?>

<form action="/actions/login.php" method="post">
<div class="col-sm-12">
<div class="row">
    <div id="loginstyle">
        <h3>Already a Member? Sign In<br>
        Not a Member<br>
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
</div>
</div>



<?php

endif;
echo '</div>';

?>
        </div>
    </div>
</div>


<?php
require_once("footer.php");

?>