<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                		<?php 
                		  // This php code in here will generate the nav bar
                		  $navigation = new Database();
                		  $sqlCmd = "SELECT * FROM Category";
                		  $navigationData = $navigation->getData($sqlCmd);
                		  $counter = 0;
                		  for ($counter; $counter < count($navigationData); ++$counter){
                		      echo "<li><a href='#'>{$navigationData[$counter]['Cat_Title']}</a></li>";
                		  }
                		?>

                     <li>
                         <a href="admin">Admin</a>
                     </li>
<!--                     <li> -->
<!--                         <a href="#">Services</a> -->
<!--                     </li> -->
<!--                     <li> -->
<!--                         <a href="#">Contact</a> -->
<!--                     </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
