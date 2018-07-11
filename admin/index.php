<?php

require_once 'settings.php';

        if (!isset($_SESSION['username']))
        {
                redirect("admin/login.php");
        }


 ?>

<!DOCTYPE html>
<html>
<head>
        <title>Admin - Home Page</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/bootstrap.min.css"; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/admin.css"; ?>">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>
<body>
        <!--BUTOANE DIN HEADER -->

        <div class="jumbotron d-flex justify-content-around " style="margin-top: 350px;">
                <a class="btn btn-primary btn-lg" href="addarticle.php" role="button">Add an article</a>
                <a class="btn btn-primary btn-lg" href="view_articles.php" role="button">View all articles</a>
                <a class="btn btn-primary btn-lg" href="logout.php" role="button">Log Out</a>
        </div>


        <script src="<?php echo BASE_URL . "js/jq.js"?>"></script>
        <script src="<?php echo BASE_URL . "js/bootstrap.min.js"?>"></script>
</body>
</html>
