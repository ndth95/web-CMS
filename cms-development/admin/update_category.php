<form action="" method="post">
    <div class="form-group">
        <?php
        // This php code at here will be used to get the data of the category
        // Then it will be place inside the box
        // However, it will check if the edit button next to the category is activated
        // Then it will perform the action
        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];
            $query_command = "SELECT * FROM Category WHERE Cat_id = {$edit_id}";
            $edit_connection = new Database();
            $cat_data = $edit_connection->getData($query_command);
            $counter = 0;
            for ($counter; $counter < sizeof($cat_data); ++$counter) {
                $Cat_Title = $cat_data[$counter]['Cat_Title'];
                $Cat_id = $cat_data[$counter]['Cat_id'];
            }
        }
        ?>
        <label for="cat_title">Edit Category</label>
        <input class="form-control" type="text" name="new_cat_title" value="<?php if (isset($Cat_Title)) {
            echo $Cat_Title;
        } ?>">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_submit"
               value="Edit Category">
        <input class="btn btn-primary" type="submit" name="cancel_action"
               value="Cancel">

        <?php
            if (isset($_POST['cancel_action'])){
                echo "DONE";
                header("Location: categories.php");
            }
        ?>
    </div>



    <?php
    // This php code at here will be used to change the category
    if (isset($_POST['edit_submit'])) {
        $new_category = $_POST['new_cat_title'];
        $edit_connection = new Database();
        $existence = $edit_connection->category_is_exists($new_category);
        if ($new_category == "" || empty($new_category) || $existence == true) {
            echo "<p><b>Category is invalid !!!</b></p>";
            echo "<p><b>Or it is already added !!!</b></p>";
        } else {
            $sql_command = "UPDATE Category SET Cat_Title = '$new_category' WHERE Cat_id = '$Cat_id'";
            $edit_connection->queryDatabase($sql_command);
            header("Location: categories.php");
        }
    }
    ?>
</form>