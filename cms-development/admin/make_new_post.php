<?php
if (isset($_POST['make_new_post'])) {
    $post_title = $_POST['post_title'];
    $post_category = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_date = date("d-m-y");
    $post_content = $_POST['post_content'];
    move_uploaded_file($post_image_temp, "images/$post_image");

    $post_upload_conn = new Database();
    $query_command = "INSERT INTO Post(Post_Cat_id, Post_Title, Post_Author, Post_Date, Post_Image, Post_Content, Post_Tags)";
    $query_command .= " VALUES('{$post_category}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}')";
    $post_upload_conn->queryDatabase($query_command);
    header("Location: posts.php");
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category</label>
        <br>
        <?php
        $query_command = "SELECT * FROM Category";
        $conn_instance = new Database();
        $cat_data = $conn_instance->getData($query_command); ?>
        <select name="post_category" id="">
            <?php
            if ($cat_data != -1) {
                $counter = 0;
                for ($counter; $counter < sizeof($cat_data); ++$counter) {
                    $Cat_Title = $cat_data[$counter]['Cat_Title'];
                    $Cat_id = $cat_data[$counter]['Cat_id']; ?>
                    <option value="<?php echo $Cat_id ?>"><?php echo $Cat_Title ?></option>
                    <?php
                }
            }
            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_status">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Content</label>
        <br>
        <textarea name="post_content" cols="120" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="make_new_post" class="btn btn-primary" value="Create New Post">
    </div>
</form>











