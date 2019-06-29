<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="search_submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
            </div>
        </form>
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">

                <?php
                $queryCommand = "SELECT * FROM Category";
                $conn_instance = new Database();
                $cat_data = $conn_instance->getData($queryCommand);
                if ($cat_data != -1) {
                    $counter = 0;
                    for ($counter; $counter < sizeof($cat_data); ++$counter) {
                        $Cat_Title = $cat_data[$counter]['Cat_Title']; ?>

                        <li><a href=""><?php echo $Cat_Title ?></a></li>

                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus
            laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>
    <hr>
</div>
