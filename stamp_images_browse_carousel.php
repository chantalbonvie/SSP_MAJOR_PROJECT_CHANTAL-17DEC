<?php
require_once("header.php");

//print_r($_SESSION); use for checking 

?>
<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.5s;
  margin: 20px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 8px 16px;
}
</style>


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
   <img src="'.$row["stamp_image"].'" alt="'.$row["country"].'" />
   <div class="carousel-caption">

    <h4>'.$row["id"].'
  '.$row["country"].'</h4>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}
?>
<div class="headerbrowse">
  <div class="col-md-12">
    <h4><p>Browse Stamps and Comment Below</p></h4>
  </div>
</div>
<div class="searchstamps">
<div class="col-md-12">
  <div class="row">
<div class = "col-md-1">
  </div>
  <div class="col-md-9">
    <div class="card mx-3">

        <div class="card-body">
        <blockquote class="blockquote mb-10">

        <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <?php echo make_slide_indicators($conn); ?>
                </ol>
              <div class="carousel-inner">
                <?php echo make_slides($conn); ?>
              </div>
              <a class="left_dynamic_slide_show" href="#dynamic_slide_show" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="sr-only">Previous</span>
              </a>
              <a class="right_dynamic_slide_show" href="#dynamic_slide_show" role="button" data-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="sr-only">Next</span>
              </a>
              </a>
        <footer>
      </blockquote>


  <form action="/actions/favoritepage.php" method="post">
    <br>

      <input type="text" name="stamp_id" value="" placeholder="Stamp ID # Only - located bottom of image">
<br><br>
      <input type="text" name="comment" value="" placeholder="Your Comment">
<br>

      <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]?>">
<br>
      <input type="submit" class="insome" value="Submit">
  </form>
  </div>
  </div>
  </div>

  </div>
</div>
</div>
</div>
</div>
</div>

<?php
require_once("footer.php");
?>