<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Post ID</th>
        <th>Author</th>
        <th>Post Title</th>
        <th>Post Category</th>
        <th>Post Image</th>
        <th>Post Tags</th>
        <th>Post Status</th>
        <th>Edit Post</th>
        <th>Remove Post</th>
    </tr>
    </thead>

    <tbody>
    <?php
    // This php code at here will take the post data from cms database
    // Then it will get back the result and print it out on the post page
    $posts_connection = new Database();
    $sql_command = "SELECT * FROM Post";
    $posts_data = $posts_connection->getData($sql_command);
    $counter = 0;
    if ($posts_data != -1) {
        for ($counter; $counter < sizeof($posts_data); ++$counter) {
            $post_id = $posts_data[$counter]['Post_id'];
            $author = $posts_data[$counter]['Post_Author'];
            $title = $posts_data[$counter]['Post_Title'];
            $post_cat = $posts_data[$counter]['Post_Cat_id'];
            $status = $posts_data[$counter]['Post_Status'];
            $image = $posts_data[$counter]['Post_Image'];
            $tags = $posts_data[$counter]['Post_Tags']; ?>

            <tr>
                <td><?php echo $post_id ?></td>
                <td><?php echo $author ?></td>
                <td><?php echo $title ?></td>
                <td><?php echo $post_cat ?></td>
                <td><img width="100" src="images/<?php echo $image ?>" alt="<?php echo $image ?>"></td>
                <td><?php echo $tags ?></td>
                <td><?php echo $status ?></td>
                <td><a class="btn btn-danger"
                       href="posts.php?<?php echo "edit_id={$post_id}&post_nav=edit_post" ?>">Edit</a>
                </td>
                <td><a class="btn btn-danger"
                       href="posts.php?<?php echo "delete_id={$post_id}" ?>">Remove</a></td>
                <?php
                require 'delete_post.php';
                ?>
            </tr>
            <?php
        }
    } else { ?>
        <tr>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
            <td><b>Not Available</b></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>