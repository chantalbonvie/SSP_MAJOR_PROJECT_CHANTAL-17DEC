<?php 

session_start();

/*********************
 *   ! IMPORTANT !   *
 *********************/
if (!isset($_SESSION["user_id"])) {
    header("Location: http://".$_SERVER["SERVER_NAME"]);
} else {

}

?>
<?php require_once("header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Add Article</h1>

            <?php require_once($_SERVER["DOCUMENT_ROOT"]."/includes/error_check.php"); ?>

            <form action="/actions/create_post_action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Article Title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="featured_image">Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="action" value="publish">Publish</button>
            </form>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>