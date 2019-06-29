<!-- Require the function of the web service -->
<?php
require 'includes/database_connection/database_connection.php';
// Information of database connection
require 'php_server_information/sql_server_info.php';
// Database class
require 'includes/database_connection/Database.php';
?>

<!-- Header -->
<?php
require 'includes/resusable_html/header.php';
?>

<!-- Navigation -->
<?php
require 'includes/resusable_html/navigation.php';
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!--             Post -->
            <?php
            // Search engine
            if (isset($_POST['search_submit'])) {
                $searching_item = $_POST['search'];
                $connetion = new Database_Connection(hostname, username, userpass, tablename);
                $databaseConn = $connetion->establishConnection();
                $searching_item = mysqli_real_escape_string($databaseConn, $searching_item);
                $sqlCommand = "SELECT * FROM Post WHERE Post_Tags LIKE '%$searching_item%'";
                $queryStatus = mysqli_query($databaseConn, $sqlCommand);
                if (!$queryStatus) {
                    echo "" . mysqli_error($databaseConn);
                } else {
                    $counter = mysqli_num_rows($queryStatus);
                    if ($counter == 0) { ?>
                        <script>
                            alert("Sorry But There Is No Post Of This !!!");
                        </script>
                    <?php
                        require "includes/resusable_html/post.php";
                    ?>
                    <?php } else {
                        while ($postData = mysqli_fetch_assoc($queryStatus)) {
                            $post_title = $postData['Post_Title'];
                            $post_author = $postData['Post_Author'];
                            $post_date = $postData['Post_Date'];
                            $post_image = $postData['Post_Image'];
                            $post_content = $postData['Post_Content']; ?>

                            <h1 class="page-header">
                                Page Heading
                                <small>Secondary Text</small>
                            </h1>

                            <h2>
                                <a href="#"><?php echo $post_title ?></a>
                            </h2>

                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p>

                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>

                            <hr>

                            <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                            <hr>

                            <p><?php echo $post_content ?></p>

                            <a class="btn btn-primary" href="#">Read More <span
                                        class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                            <?php
                        }
                    }
                }
            }

            ?>


            <!-- Pager -->
            <?php
            require 'includes/resusable_html/pager.php';
            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        require 'includes/resusable_html/sidebar.php';
        ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php
    require 'includes/resusable_html/footer.php';
    ?>
