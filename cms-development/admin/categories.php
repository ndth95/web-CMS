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
                    <div class="col-xs-6">
                        <?php
                            insert_new_category();
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add New Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="cat_submit"
                                       value="Add Category ">
                            </div>
                        </form>

                        <?php
                        if (isset($_GET['edit_id'])) {
                            $Cat_id = $_GET['edit_id'];
                            require "update_category.php";
                        }
                        ?>

                    </div>

                    <!--                    This will be the table of all category-->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Title</th>
                                <th>Remove Category</th>
                                <th>Edit Category</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                                make_category_table();
                            ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

<?php
require 'includes/resusable_html/footer.php';
?>