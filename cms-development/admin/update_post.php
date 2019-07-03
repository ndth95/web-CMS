<?php
// This php code in here will get the data and fill it into the blank first
$posts_connection = new Database();
$sql_command = "SELECT * FROM Post";
$posts_data = $posts_connection->getData($sql_command);
$counter = 0;
if ($posts_data != -1) {
    for ($counter; $counter < sizeof($posts_data); ++$counter) {
        $author = $posts_data[$counter]['Post_Author'];
        $title = $posts_data[$counter]['Post_Title'];
        $post_cat = $posts_data[$counter]['Post_Cat_id'];
        $status = $posts_data[$counter]['Post_Status'];
        $image = $posts_data[$counter]['Post_Image'];
        $tags = $posts_data[$counter]['Post_Tags'];
        $content = $posts_data[$counter]['Post_Content'];
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $title ?>" type="text" name="post_title" class="form-control">
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
        <input value="<?php echo $author ?>" type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $status ?>" type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Image</label>
        <br>
        <img width="100" src="images/<?php echo $image?>" alt="<?php echo $image ?>">
        <br>
        <br>
        <input value="<?php echo $image ?>" type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_status">Post Tags</label>
        <input value="<?php echo $tags ?>" type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Content</label>
        <br>
        <textarea name="post_content" cols="120" rows="10"><?php echo $content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="edit_post" class="btn btn-primary" value="Update Post">
    </div>
</form>

<?php
if (isset($_POST['edit_post'])) {
    $post_id = $_GET['edit_id'];
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

    if (empty($post_image)){
        $query_command = "SELECT * FROM Post WHERE Post_id = $post_id";
        $img_connection = new Database();
        $img_data = $img_connection->getData($query_command);
        if ($img_data != -1){
            $counter = 0;
            for ($counter; $counter < sizeof($img_data); ++$counter){
                $post_image = $img_data[$counter]['Post_Image'];
            }
        }
    }

    $post_edit_conn = new Database();
    $post_edit_conn->queryDatabase($query_command);
    $query_command = "UPDATE Post SET ";
    $query_command .= "Post_Cat_id = '$post_category', ";
    $query_command .= "Post_Title = '$post_title', ";
    $query_command .= "Post_Author = '$post_author', ";
    $query_command .= "Post_Date = now(), ";
    $query_command .= "Post_Image = '$post_image', ";
    $query_command .= "Post_Content = '$post_content', ";
    $query_command .= "Post_Tags = '$post_tags' ";
    $query_command .= "WHERE Post_id = $post_id";
    $post_edit_conn->queryDatabase($query_command);
    header("Location: posts.php");
}
?>
