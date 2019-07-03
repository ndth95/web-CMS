<?php
if (isset($_GET['delete_id'])){
    $delete_post_conn = new Database();
    $post_id = $_GET['delete_id'];
    $query_command = "DELETE FROM Post WHERE Post_id = {$post_id}";
    $delete_post_conn->queryDatabase($query_command);
    header("Location: posts.php");
}
?>