<?php
require_once("header.php");
//all processing happens before loading html

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "add_cool_tag" ){
    //tag id and article_id
    $tag_id = $_REQUEST["tag_id"];
    $article_id = $_REQUEST["article_id"];
    $add_cool_tag_query = "INSERT INTO articles_tags (tag_id, article_id)
    VALUE ($tag_id), $article_id)";

    if(mysqli_query($conn, $add_cool_query)){
        //it will work

    }
}

?>

<div class="container">
    <div class="row">
    <div class="col-12"><h1>SSP DRILL 4</h1>
    </div>
        
            <div class="col-12">

                <p>
                    kdjfdkkd

                </p>

                <p>

                dfdkska

                </p>

                <hr>
    </div>

        <div class="col-md-8 card p-4">
            <h2></h2>
            <?php
            $articles_query = "SELECT * FROM
                            articles";
                if($articles_resutls = mysqli_query($conn, $articles_query)){
                    while($articles_row = mysqli_fetch_array($articles, results)){
                        echo "<h3>";
                        echo $article_row["title"];
                        echo "</h3>";

                        //make section for tags
                        echo "<p><strong>Tags:  </strong>";
                        $cool_tag_query = "SELECT 
                                        articles_tags.*, tags.tag
                                        FROM articles_tags
                                        LEFT JOIN tags
                                        ON article_tags.tag_id =tags.id
                                        WHERE articles_tags.article_id = 
                                        " .$article_row["row"];
                        if($cool_tag_results = mysqli_query($conn, $cool_tag_query)){
                            $comma = "";
                            while($cool_tag_row = mysqli_fetch_arry($cool_tag_results))
                            {
                            echo $comma .$cool_tag_row["tag"];
                            $comma = ". ";
                            }
                        }

                        echo "</p>";
                    


              ?>
            <form action="drill4.php" class="input-group">
                <input type="hidden" name="article_id" value="
                <?=$article_row["id"]?>">
                        <select name="tag_id" class="form-control">
                           <?php
                $tags_query = "SELECT * FROM tags";
                if($tags_results = mysqli_query($conn, $tags_query)){
                    echo "<ul>";
                    while($tag_option = mysqli_fetch_array($tags_results)){
                        echo "<option value = '".$tag_option["id"]."
                          '>". $tag_option["tag"]."</option>";
                    }
                    echo "</ul>";
                }
                            
                ?>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" name="action" value="add_cool_tag"
                        class="btn btn-primary">
                            Add Tag</button>
                    </div>
            </form>

            <?php
                        echo "<hr>";

                    } //end of $article_row while

                }   // end of articles_results if

            ?>



    </div>

        <div class="col-md-4 card">
            <h3>Tags</h3>
            <?php
            $tags_query = "SELECT * FROM tags";
            if($tags_results = mysqli_query($conn, $tags_query)){
                echo "<ul>";
                while($tag_row = mysqli_fetch_array($tags_results)){
                    echo "<li>";
                    echo $tag_row["tag"];
                    echo "</li>";
                }
                echo "</ul>";
            }

            ?>
