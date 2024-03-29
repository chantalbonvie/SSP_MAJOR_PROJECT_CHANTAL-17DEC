<?php require_once("header.php"); ?>

<div class="container">
    <div class="row">
        <?php 

        if(isset($_GET["id"])) { // SHOW SINGLE ARTICLE

            $article_query = "  SELECT  articles.*, 
                                        users.first_name, 
                                        users.last_name,
                                        images.url AS featured_image
                                FROM articles 
                                LEFT JOIN users
                                ON articles.author_id = users.id
                                LEFT JOIN images
                                ON articles.image_id = images.id
                                WHERE articles.id = ".$_GET["id"];

            if ($article_result = mysqli_query($conn, $article_query)) {
                while($article_row = mysqli_fetch_array($article_result)):
                ?>
                <div class="col-12">
                    <h1><?=$article_row["title"]?></h1>
                    <p class="text-muted">Published on <?=date("M jS, Y @ hA" , strtotime($article_row["date_created"]));?> by <a href="/profile.php?user_id=<?=$article_row["author_id"]?>"><?=$article_row["first_name"]." ".$article_row["last_name"]?></a></p>
                </div>
                <div class="col-4">
                    <figure>
                        <img src="<?=$article_row["featured_image"]?>" class="w-100">
                    </figure>
                </div>
                <div class="col-8">
                    <?php 
                        echo $article_row["content"];
                    ?>
                </div>
                <?php

                if ((isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $article_row["author_id"])) {
                    echo "<hr>";
                    echo "<div class='col-12'>";
                    echo "<a class='btn btn-warning' href='edit_post.php?article_id=".$article_row["id"]."'>Edit Article</a>";
                    echo "</div>";

                }
                
                endwhile;

                echo "<div class='col-12'>";
                echo "<a href='/articles.php' class='btn btn-primary mt-3'>Back to Posts</a></div>";
            } else {
                echo mysqli_error($conn);
            }
            
        } else { // SHOW ALL ARTICLES //

            $search_query = (isset($_GET["search"])) ? $_GET["search"] : false;

            if ($search_query) {
                echo "<h1>Search results for: $search_query</h1>";
            } else {
                echo "<h1>Articles</h1>";
            }
            
            ?>

            <div class="col-12">
            
                <ol>
            <?php
            $article_query = "  SELECT 
                                articles.title, 
                                articles.id,
                                images.url AS featured_image,
                                articles.author_id,
                                users.first_name, users.last_name,
                                articles.date_created
                                FROM articles
                                LEFT JOIN images
                                ON articles.image_id = images.id
                                LEFT JOIN users
                                ON articles.author_id = users.id";
            $art_where_search ="";
            if ($search_query) {
            $art_where_search =" WHERE articles.title LIKE '%$search_query%'
                                OR  articles.content LIKE '%$search_query%'";
            $article_query .= $art_where_search;
            }

            // ! / / // / / ! //
            // !!!!!!!!!!!!!! //
            // ! PAGINATION ! //
            // !!!!!!!!!!!!!! //
            // ! / / // / / ! //
            $current_page = (isset($_GET["page"])) ? $_GET["page"] : 1;
            $limit = 5;
            $offset = $limit * ($current_page - 1);

            $article_query.= "  ORDER BY articles.date_created DESC
                                LIMIT $limit OFFSET $offset"; 

            if ($article_result = mysqli_query($conn, $article_query)) {


                // ! / / // / / ! //
                // !!!!!!!!!!!!!! //
                // ! PAGINATION ! //
                // !!!!!!!!!!!!!! //
                // ! / / // / / ! //
                $pagi_query = "SELECT COUNT(*) AS total FROM articles";

                if ($search_query) {
                    $pagi_query .= $art_where_search;
                }
                $pagi_result = mysqli_query($conn, $pagi_query);
                $pagi_row = mysqli_fetch_array($pagi_result);
                $total_articles = $pagi_row["total"];

                $page_count = ceil($total_articles / $limit);
                // floor = down
                // ceil = up
                // round = down < 5, up > 5

                echo "<nav><ul class='pagination'>";

                $get_search = ($search_query) ? "&search=".$search_query : "";

                if ($current_page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='/articles.php?page=".($current_page - 1)."$get_search'>Previous</a></li>";
                }

                for ($i = 1; $i <= $page_count; $i++) {
                    echo "<li class='page-item";
                    if ($current_page == $i) echo " active"; 
                    echo "'><a class='page-link' href='/articles.php?page=$i".$get_search."'>$i</a></li>";
                }

                if ($current_page < $page_count) {
                    echo "<li class='page-item'><a class='page-link' href='/articles.php?page=".($current_page + 1)."$get_search'>Next</a></li>";
                }

                echo "</ul></nav>";

                while ($article_row = mysqli_fetch_array($article_result)) {
                    ?>

                    <div class="card col-12 mb-3">
                        <div class="row no-gutters">
                            <div class="col-sm-3">
                                <img src="<?=$article_row["featured_image"]?>" class="card-img">
                            </div>
                            <div class="col-sm-9" style="display: flex; flex-direction: column;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="/articles.php?id=<?=$article_row["id"]?>"><?=$article_row["title"]?></a>
                                    </h5>
                                    <small class="text-muted">
                                        <?="By <a href='/profile.php?user_id=".$article_row["author_id"]."'>".
                                        $article_row["first_name"].
                                        " ".$article_row["last_name"].
                                        "</a> on ".
                                        date("M jS, Y @ hA" , strtotime($article_row["date_created"]))?>
                                    </small>
                                </div>
                                <div class="ml-3">
                                    <p>
                                        <a href="/articles.php?id=<?=$article_row["id"]?>" class="btn btn-primary">Read More</a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    
                }

            } else {
                echo mysqli_error($conn);
            }

        }

        ?>

            </ol>
        </div>
    </div>
</div>





<?php require_once("footer.php"); ?>