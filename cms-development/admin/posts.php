<?php
require 'includes/resusable_html/header.php';
require 'php_server_information/sql_server_info.php';
require 'database_connection/Database.php';
require 'admin-server-functions/admin_function.php';
?>


    <body>

<div id="wrapper">

<?php
require 'includes/resusable_html/navigation.php';
?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Admin Control Panel
                        <small>Admin User</small>
                    </h1>

                    <?php
                    // This navigation will direct the user to all component of post function
                    if (isset($_GET['post_nav'])) {
                        $post_nav = $_GET['post_nav'];
                    } else {
                        $post_nav = null;
                    }
                    switch ($post_nav) {
                        case 'make_new_post':
                            require 'make_new_post.php';
                            break;
                        case 'edit_post':
                            require 'update_post.php';
                            break;
                        default:
                            require 'view_all_posts.php';
                            break;
                    }
                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

<?php
require 'includes/resusable_html/footer.php';
?>