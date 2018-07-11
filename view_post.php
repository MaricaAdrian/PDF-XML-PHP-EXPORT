<?php
include_once "admin/settings.php";


if(isset($_GET['id']))
{
        $query = mysqli_query($db, "SELECT * FROM `posts` WHERE id='".$_GET['id']."' ");
        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
                $title = $row['title'];
                $author = $row['author'];
                $content = $row['content'];

        } ?>
                <div class="col-12  border-bottom" style="margin-top:20px;  font-family: 'Oswald', sans-serif;"  >
                        <h1 class="text-muted text-center"> <?php echo $title; ?></h1>

                        </br>
                        <p class="text-info" >Author: <?php echo $author; ?></p>
                        </br>
                        <p>
                        <?php echo $content; ?>
                        </p>
                </div>

<?php

}


?>
<!DOCTYPE html>
<html>
<head>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/bootstrap.min.css"; ?>">
        <title>View posts from news</title>
</head>
<body>

</body>
</html>
