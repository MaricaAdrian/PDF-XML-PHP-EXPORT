<?php
include_once "admin/settings.php";

$query = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM `posts`"),  MYSQLI_BOTH);
$numbers = $query[0];

$perpage = 3;

$totalpages = ceil($numbers / $perpage);


if(isset($_GET['page']))
{
        $currentpage = (int) $_GET['page'];
}
else
{
        $currentpage = 1;
}

if($currentpage < 1)
{
        $currentpage = 1;
}

if($currentpage > $totalpages)
{
        $currentpage = $totalpages;
}

$offset = ($currentpage - 1) * $perpage;



?>


<!DOCTYPE html>
<html>
<head>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="css\style.css" type="text/css" rel="stylesheet" />

        <title>Main page</title>
</head>
<body>
        <div class="header">
                <?php
                include_once "includes/header.php";
                ?>
                <div class="jumbotron">

                </div>
        </div>

        <div id="content" class="col-12">
                <div class="container-fluid">
                        <div class="row">
                                <div id="news" class="col-3">
                                        <h1><span class="badge badge-secondary">Interesting articles</span></h1>
                                        <ol class="list-group">


                                                <?php
                                                $query = mysqli_query($db, "SELECT  id, title FROM `posts` ORDER BY RAND() DESC LIMIT 0,5");
                                                while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
                                                {
                                                        $id = $row['id'];
                                                        $title =$row['title'];

                                                        ?>

                                                        <li class="list-group-item"><a href="view_post.php?id=<?php echo $id; ?>"> <?php echo $title; ?></a> </li>
                                                <?php } ?>
                                        </ol>
                                </div>
                                <div id="articles" class="col-8 border-0">
                                        <div id="articles-content" style="background-color:white; font-family: 'Oswald', sans-serif;">

                                                <?php

                                                $query = mysqli_query($db, "SELECT * FROM `posts` ORDER BY id DESC LIMIT ".$offset.",".$perpage."");
                                                while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
                                                {

                                                        $title = $row['title'];
                                                        $author = $row['author'];
                                                        $content = $row['content'];
                                                        ?>

                                                        <div class="row border-bottom" style="margin-bottom: 1px solid black;">
                                                                <div class="col-12">
                                                                        <h1 class="text-muted text-center"> <?php echo $title; ?></h1>
                                                                        <p class="text-info" >Author: <?php echo $author; ?></p>
                                                                        <p>
                                                                                <?php echo $content; ?>
                                                                        </p>
                                                                </div>
                                                        </div>
                                                <?php } ?>


                                        </div>
                                </div>
                                <div id="pagination" class="col-12">
                                        <nav aria-label="...">
                                                <ul class="pagination justify-content-end">
                                                        <?php
                                                                $range = 3;
                                                                if($currentpage > 1)
                                                                {
                                                                        $prevpage = (int) $currentpage - 1;
                                                        ?>
                                                                <li class="page-item">
                                                                        <a class="page-link text-dark" href="<?php echo BASE_URL . "index.php?page=" . $prevpage; ?>" tabindex="-1">Previous</a>
                                                                </li>
                                                        <?php
                                                                }

                                                                for($i = ($currentpage - $range); $i < ($currentpage + $range) + 1; $i++)
                                                                {
                                                                        if($i > 0 && $i <= $totalpages)
                                                                        {
                                                                                if($i == $currentpage)
                                                                                { ?>
                                                                                        <li class="page-item active">
                                                                                                <a class="page-link text-dark" href="<?php echo BASE_URL . "index.php?page=" . $currentpage;?>"><?php echo $currentpage; ?> <span class="sr-only">(current)</span></a>
                                                                                        </li>
                                                                                <?php
                                                                                }
                                                                                else
                                                                                { ?>
                                                                                        <li class="page-item"><a class="page-link text-dark" href="<?php echo BASE_URL . "index.php?page=" . $i;?>"><?php echo $i; ?></a></li>
                                                                                <?php
                                                                                }
                                                                        }
                                                                }
                                                                if($currentpage != $totalpages)
                                                                {
                                                                        $nextpage = (int) $currentpage + 1;
                                                                ?>
                                                                <li class="page-item">
                                                                        <a class="page-link text-dark" href="<?php echo BASE_URL . "index.php?page=" . $nextpage;?>">Next</a>
                                                                </li>
                                                                <?php
                                                                }
                                                        ?>


                                                </ul>
                                        </nav>
                                </div>
                        </div>

                </div>

        </div>


        <div id="footer">
                <div id="jumbotron-footerr" class="jumbotron jumbotron-fluid">
                        <div class="container col-12 text-right">
                                <p>
                                        &copy; <?php echo date('Y'); ?> Created by Manea Anca-Gabriela &amp; Marica Adrian-Gabriel. All rights reserved.
                                </p>
                        </div>
                </div>
        </div>
        <script src="js/jq.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>
</html>
