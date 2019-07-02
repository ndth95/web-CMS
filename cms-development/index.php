<!-- Require the function of the web service -->
<?php
// Information of database connection
require 'php_server_information/sql_server_info.php';
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
            require 'includes/resusable_html/post.php';
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
