<?php 
    // Extract all the data from the database of post
    $postConnection = new Database_Connection(hostname, username, userpass, tablename);
    $sqlCmd = "SELECT * FROM Post";
    $postData = $postConnection->getData($sqlCmd);
    
    // Print out all the information from post
    $counter = 0;
    for ($counter; $counter < count($postData); ++$counter){
        $post_title = $postData[$counter]['Post_Title'];
        $post_author = $postData[$counter]['Post_Author'];
        $post_date = $postData[$counter]['Post_Date'];
        $post_image = $postData[$counter]['Post_Image'];
        $post_content = $postData[$counter]['Post_Content']; ?>
       	
<h1 class="page-header">
    Page Heading
    <small>Secondary Text</small>
</h1>
       	
<h2>
	<a href="#"><?php echo $post_title?></a>
</h2>

<p class="lead">
    by <a href="index.php"><?php echo $post_author?></a>
</p>

<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date?></p>

<hr>

<img class="img-responsive" src="images/<?php echo $post_image?>" alt="">

<hr>

<p><?php echo $post_content?></p>

<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
        
<?php
    }
?>








