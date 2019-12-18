<?php
require_once("conn.php");
?>

<!doctype html>
<html lang="en":>
<head>

<title>Posting Den - <h3> Stamps From Around The World</h3></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="/css/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link href="https://fonts.googleapis.com/css?family=PT+Serif&display=swap" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark navbar-expand-lg justify-content-between">
  <a class="navbar-brand mx-lg-0 order-1 order-lg-2">
  </a>
  <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target="#navbar-list-9" aria-controls="navbarNav"
   aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse w-100 order-3 order-lg-1" id="navbar-list-9">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/signup.php">FREE Sign Up</a>
      </li>
      <?php if (!isset($_SESSION["user_id"])): ?>
      <li class="nav-item ml-auto mr-0">
        <a href="/" class="nav-link"></a>
      </li>
      <li class="nav-item ml-auto mr-0">
        <table>
          <tr>
            <td>  
              <div class="nav-logo">
        <h1>The Posting Den</h1></a>
              </div>
      </td>
      </tr>
      </table>
      </li>
      <li>
      <a href="https://www.facebook.com/chantal.dominique.5817" class="facebooklink" target="_blank">
      <p>Join Us On Facebook</p>
      </a>
      </li>



      <?php endif; ?>
    </ul>
  </div>
  <?php if (isset($_SESSION["user_id"])): ?>

    
  <div class="collapse navbar-collapse justify-content-center w-75 order-3" id="navbar-list-9">
      <ul class="navbar-nav">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" 
          href="#" 
          id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Chat</a>
            <a class="dropdown-item" href="/stamp_images_browse_carousel.php">Browse Our Collection</a>
            <a class="dropdown-item" href="/edit_profile.php">Edit Your Profile</a>
            <form action="/actions/login.php" method="post">
              <button type="submit" name="action" value="logout">
                  Logout
              </button>
              <br>
            </form> 
          </div>
        </li>   
      </ul> 
      <div class="memberarealabel">
      <p>Member Area</p>
  </div>
  </div>
  <?php endif;?>
</nav>





