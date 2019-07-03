<?php
function insert_new_category()
{
    // This code php at here will insert the new category into the system
    // It will also check if the category is already exists or not
    // If not it will add the new category into the system
    if (isset($_POST['cat_submit'])) {
        $new_category = $_POST['cat_title'];
        $cat_connection = new Database();
        $existence = $cat_connection->category_is_exists($new_category);
        if ($existence == true || $new_category == "" || empty($new_category)) {
            echo "<p><b>Category is invalid !!!</b></p>";
            echo "<p><b>Or it is already added !!!</b></p>";
        } else {
            $sql_command = "INSERT INTO Category(Cat_Title) VALUE('$new_category')";
            $cat_connection->queryDatabase($sql_command);
        }
    }
}

function make_category_table()
{
    // This is the php code to get the data from the database of category
    // And display it to the admin page
    $query_command = "SELECT * FROM Category";
    $conn_instance = new Database();
    $cat_data = $conn_instance->getData($query_command);
    if ($cat_data != -1) {
        $counter = 0;
        for ($counter; $counter < sizeof($cat_data); ++$counter) {
            $Cat_Title = $cat_data[$counter]['Cat_Title'];
            $Cat_id = $cat_data[$counter]['Cat_id']; ?>
            <tr>
                <td><?php echo $Cat_id ?></td>
                <td><?php echo $Cat_Title ?></td>
                <td><a class="btn btn-danger"
                       href="categories.php?<?php echo "edit_id={$Cat_id}" ?>">Edit</a>
                </td>
                <td><a class="btn btn-danger"
                       href="categories.php?<?php echo "delete_id={$Cat_id}" ?>">Remove</a></td>

                <?php
                // This php code in here will handle the delete function
                if (isset($_GET['delete_id'])) {
                    $delete_id = $_GET['delete_id'];
                    $query_command = "DELETE FROM Category WHERE Cat_id = $delete_id";
                    $delete_conn = new Database();
                    $delete_conn->queryDatabase($query_command);

                    header("Location: categories.php");
                }
                ?>
            </tr>
            <?php
        }
    } else {
        echo "<tr>";
        echo "<td><b>Not Available</b></td>";
        echo "<td><b>Not Available</b></td>";
        echo "<td><b>Not Available</b></td>";
        echo "<td><b>Not Available</b></td>";
        echo "<tr>";
    }
}

?>