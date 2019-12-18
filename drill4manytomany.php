<?php require_once("header.php"); ?>

<?php 


// ANCHOR CREATE TAG
if (isset($_POST["action"]) && $_POST["action"] == "create_tag") {

    $new_tag = $_POST["tags"];
    
    $create_query = "INSERT INTO tags (name) VALUES ('$new_tag')";
    
    if (mysqli_query($conn, $create_query)) {
    
    } else {
        echo mysqli_error($conn);
    }
    
// ANCHOR DELETE TAG
} elseif (isset($_GET["action"]) && $_GET["action"] == "delete") {

    $tag_id = $_GET["id"];
    $delete_query = "DELETE FROM tags WHERE id = $tag_id";
    mysqli_query($conn, $delete_query);
     
// ANCHOR UPDATE TAG
} elseif (isset($_POST["action"]) && $_POST["action"] == "update_tag") {

    $tag_id = $_POST["tag_id"];
    $new_tag_value = $_POST["tags"];
    $update_query = "   UPDATE tags
                        SET name = '$new_tag_value'
                        WHERE id = $tag_id";
    mysqli_query($conn, $update_query);

// ANCHOR ADD ARTICLE TAG
} elseif (isset($_POST["action"]) && $_POST["action"] == "add_article_tag") {

    $article_id = $_POST["article_id"];
    $tag_id     = $_POST["select_article_tag"];

    $article_tag_query = "INSERT INTO article_tags (article_id, tag_id) VALUES ($article_id, $tag_id)";

    mysqli_query($conn, $article_tag_query);

}

?>

<!-- SECTION HTML  -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Select Descriptive Tags for Stamps
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <?php 
            // SECTION LIST ARTICLES QUERY
            $article_list_query = "SELECT id, title FROM articles";

            if ($article_list_result = mysqli_query($conn, $article_list_query)) {
                while ($article_list_row = mysqli_fetch_array($article_list_result)) {
                    ?>
                    <!-- SECTION ARTICLE CARDS -->
                    <div class="card mb-3">
                        <h4 class="card-header"><?=$article_list_row["title"]?></h4>

                        <div class="card-body">
                            <?php
                            // ANCHOR LIST ARTICLE'S TAGS QUERY
                            $list_article_tags_query = "SELECT * FROM article_tags
                                                        LEFT JOIN tags
                                                        ON tag_id     = tags.id
                                                        WHERE article_id = ".$article_list_row["id"];

                            if($list_article_tags_result = mysqli_query($conn, $list_article_tags_query)) {
                                echo "<strong>Tags:</strong>";
                                echo "<ul>";

                                while ($list_article_tags_row = mysqli_fetch_array($list_article_tags_result)) {
                                    echo "<li>".$list_article_tags_row["name"]."</li>";
                                }
                                echo "</ul>";
                            }

                            ?>
                        
                            <!-- SECTION ARTICLE TAGS FORM -->
                            <form action="/drill4.php" method="POST">
                                <input type="hidden" name="article_id" value="<?=$article_list_row["id"]?>">
                                <div class="input-group">
                                    <select class="form-control" name="select_article_tag">
                                        <option disabled selected></option>
                                        <?php 
                                        // ANCHOR TAGS SELECT QUERY
                                        $tags_select_query = "SELECT * FROM tags";

                                        if ($tags_select_result = mysqli_query($conn, $tags_select_query)) {
                                            while($tags_select_row = mysqli_fetch_array($tags_select_result)) {
                                                echo "<option value='".$tags_select_row["id"]."'>".$tags_select_row["name"]."</option>";
                                            }
                                        }
                                        ?>
                                        
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-info" name="action" value="add_article_tag">Add Tag</button>
                                    </div>
                                </div>
                            </form>
                            <!-- !SECTION END ARTICLE TAGS FORM -->
                        </div>
                    </div>
                    <!-- !SECTION END ARTICLE CARDS -->
                    

                    <?php
                }
            }
            // !SECTION END LIST ARTICLES QUERY
            
            ?>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <!-- SECTION CREATE/UPDATE TAGS -->
                    <ul>
                    <?php 
                    $tags_list_query = "SELECT * FROM tags";

                    if ($tags_list_result = mysqli_query($conn, $tags_list_query)) {
                        while($tags_list_row = mysqli_fetch_array($tags_list_result)) {
                            echo "<li>".$tags_list_row["name"]." <a href='?action=delete&id=".$tags_list_row["id"]."'>x</a>
                                                                 <a href='?action=edit&id=".$tags_list_row["id"]."'>edit</a>"."</li>";
                        }
                    }
                    ?>
                    </ul>

                    <form action="/drill4.php" method="POST">
                        <div class="input-group">
                            <?php 

                            $tag_value     = "";
                            $button_value   = 'create_tag';
                            $button_text    = 'Create Tag';
                            if(isset($_GET["action"]) && $_GET["action"] == "edit") {
                                $tag_id = $_GET["id"];
                            ?>
                            <input type="hidden" name="tag_id" value="<?=$tag_id?>">

                            <?php
                                $edit_query = "SELECT * FROM tags WHERE id = $tag_id";
                                if($edit_results = mysqli_query($conn, $edit_query)) {
                                    $button_value = 'update_tag';
                                    $button_text  = 'Update Tag';

                                    while ($tag_row = mysqli_fetch_array($edit_results)) {
                                        $tag_value = $tag_row["name"];
                                    }
                                }
                            }
                            ?>
                            <input type="text" name="tags" id="tags" class="form-control" value="<?=$tag_value?>">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" name="action" value="<?=$button_value?>"><?=$button_text?></button>
                            </div>
                        </div>
                    </form>
                    <!-- !SECTION END CREATE/UPDATE TAGS -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- !SECTION END HTML -->





<?php require_once("footer.php"); ?>