<?php require_once("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Title</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand mr-5" href="#">CATSocial</a>

            <!-- SEARCH BAR -->
            <form action="/articles.php" class="form-inline my-2 my-lg-0 input-group w-50">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" value="<?=(isset($_GET["search"])) ? $_GET["search"] : ""; ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER["SERVER_NAME"]; ?>">Home</a>
                    </li>

                    <?php if (isset($_SESSION["user_id"])): ?>
                    <li class="nav-item">
                        <a href="/members.php" class="nav-link">Members</a>
                    </li>
                    <li class="nav-item dropdown ml-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile.php">My Profile</a>
                            <a class="dropdown-item" href="/add_post.php">Add Article</a>
                            <a class="dropdown-item" href="/articles.php">My Articles</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/actions/login.php?action=logout">Logout</a>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item ml-auto">
                        <a href="/index.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a href="/signup.php" class="nav-link">Sign Up</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>