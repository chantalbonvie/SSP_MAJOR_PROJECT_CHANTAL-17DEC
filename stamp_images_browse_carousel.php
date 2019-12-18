<?php
require_once("header.php");

//print_r($_SESSION);

?>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 60%;
  margin: 50px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
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
    <h3>'.$row["country"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}
?>

<div class="searchstamps">
  <div class="col-md-12">
    <div class="card">
      <img src="<?=$row["stamp_image"]?>" alt="" class="card-img-top">
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
              <span class="carousel-control-prev-icon></span>
              <span class="sr-only">Previous</span>
              </a>
              <a class="right_dynamic_slide_show" href="#dynamic_slide_show" role="button" data-slide="next">
              <span class="carousel-control-next-icon></span>
              <span class="sr-only">Next</span>
              </a>
              </a>
        <footer class="blockquote-footer"></footer>
      </blockquote>
    </div>
  </div>
</div>
</div>
</div>

<?php
require_once("footer.php");
?>