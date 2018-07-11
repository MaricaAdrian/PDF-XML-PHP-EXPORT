<?php
        include_once "settings.php";

        if (!isset($_SESSION['username']))
        {
                redirect("admin/login.php");
        }

        if(isset($_GET['id']))
        { // POST INAINTE DE GET
                if(isset($_POST['submit']))
                {
                        $title = mysqli_escape_string($db, $_POST['title']);
                        $author = mysqli_escape_string($db, $_POST['author']);
                        $content = mysqli_escape_string($db, $_POST['content']);

                        $query = mysqli_query($db, "UPDATE `posts` SET title = '".$title."' , author = '".$author."', content = '".$content."' WHERE id = '".$_GET['id']."' ");

                        if(mysqli_affected_rows($db))
                        {
                                echo "Your article was updated successfully!";
                                $log = "Admin " . $_SESSION['username'] . " has updated an article (ID: ".$_GET['id'].") - " . date("d-m-Y H:i:s");
                                $query = mysqli_query($db, "INSERT INTO `logs`(user, content, date) VALUES ('".$_SESSION['username']."', '".$log."', NOW())");
                        }


                }

                $query = mysqli_query($db, "SELECT * FROM `posts` WHERE id = '".$_GET['id']."'");
                while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                {
                        $title = $row['title'];
                        $author = $row['author'];
                        $content = $row['content'];
                }


        }



 ?>

 <!DOCTYPE html>
 <html>
 <head>
         <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/bootstrap.min.css"; ?>">
         <title>Edit article</title>
 </head>
 <body>
         <div class="container">
                 <form method="post" action="edit_article.php?id=<?php echo $_GET['id']; ?> ">
                         <div class="form-group">
                                 <input class="form-control" type="text" name="title" value="<?php  echo $title;?>"/>
                                 <input class="form-control" type="text" name="author" value="<?php  echo $author;?>"/>
                         </br>
                                 <textarea class="form-control" type="text" name="content"><?php  echo $content;?></textarea>
                         </br>
                                 <input type="submit" name="submit" value="Edit Article!" />
                         </div>
                 </form>
         </div>
 </body>
 </html>
