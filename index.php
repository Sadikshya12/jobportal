    <?php 
    session_start();
    include("config/config.php");
    include("autoload.php");
    ?>

    <!DOCTYPE html>
    	<html>
    	<head>
    		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    		<title>Nexus</title>
    		<link rel="stylesheet" href="<?php echo $config['base_url'] ?>assets/bootstrap/css/bootstrap.min.css"; />
    		<link rel="stylesheet" href="<?php echo $config['base_url'] ?>assets/css/style.css"; />
    		<script src="<?php echo $config['base_url'] ?>assets/js/jquery-1.11.3.min.js"></script>
    		<script src="<?php echo $config['base_url'] ?>assets/bootstrap/js/bootstrap.min.js"></script>
    		<script src="<?php echo $config['base_url'] ?>assets/js/jquery.validate.js"></script>
            <script src="<?php echo $config['base_url'] ?>assets/js/jquery-2.1.0.min.js"></script>
            <script src="<?php echo $config['base_url'] ?>assets/js/app.js"></script>
            
    		
    	</head>
    	<body>
    		<div class="container">
              <header>

                <?php 

                $title = "Toursim Nepal";
                $metaD = "Welcome to Tourism Nepal";

                include("includes/header.php");
                ?>
            </header>

            <section>

                <?php
                if (isset($_GET['action']) && !empty($_GET['action'])) {

                    $file = "files/pages/" . $_GET['action'] . ".php";

                    if (file_exists($file)) {

                        include($file);
                    } else {

                        include("files/pages/home.php");
                    }
                } else {

                    include("files/pages/home.php");
                }
                ?>

            </section>

            <footer>
              <?php 
              include("includes/footer.php");
              ?>
          </footer>

      </body>
      </html>