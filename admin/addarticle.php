<?php
include_once "settings.php";

        if (!isset($_SESSION['username']))
        {
                redirect("admin/login.php");

        }

if(isset($_POST['submit']))
{
        $title = mysqli_escape_string($db, $_POST['title']);
        $author = mysqli_escape_string($db, $_POST['author']);
        $content = mysqli_escape_string($db, $_POST['content']);

        if(strlen($title) && strlen($author) && strlen($content))
        {
                $query = mysqli_query($db, "INSERT INTO `posts` (title, author,content) VALUES  ('".$title."', '".$author."', '".$content."')");


                if(mysqli_insert_id($db))
                {


                        $success = "Your article has been posted successfully!";
                        $log = "Admin " . $_SESSION['username'] . " has added a new article (Title: ".$title.") - " . date("d-m-Y H:i:s");
                        $query = mysqli_query($db, "INSERT INTO `logs`(user, content, date) VALUES ('".$_SESSION['username']."', '".$log."', NOW())");

                  }
                else
                {
                        $error = mysqli_error($db);
                        echo $error;

                }

        }


}




?>

<!DOCTYPE>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/bootstrap.min.css"; ?>">
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

        <title>Add article</title>
</head>
<body>
        <!--BUTOANE DIN HEADER -->
        <?php
                include_once "header.php";
         ?>

        <?php if(isset($success)) { ?>
                <p class="text-center" style="font-family: 'Oswald', sans-serif; color: green; font-size: 100px; padding-top: 30px;">
                                <?php echo $success; ?>
                </p>
        <?php } ?>
        <!-- AICI AVEM FORMularul de adaugare articol-->
        <div class="container-fluid   " style="padding-top: 200px;font-family: 'Oswald', sans-serif;">

                <?php
                if(isset($succes))
                {
                        echo $succes;
                }
                ?>

                <form  action="addarticle.php" method="post">

                        <div class="form-group col-6 mx-auto">

                                <div class="input-group mb-3 ">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Title of  the article: </span>
                                        </div>
                                        <input type="text"  name = "title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Author of  the article: </span>
                                        </div>
                                        <input type="text"  name = "author" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>


                                <label for="exampleFormControlTextarea1">Insert your article here: </label>
                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </br>
                        <input class="form-control btn btn-primary" type="submit" name="submit" value="POST ARTICLE" />

                </div>





        </form>









</div>
<script src="<?php echo BASE_URL . "js/jq.js"?>"></script>
<script src="<?php echo BASE_URL . "js/bootstrap.min.js"?>"></script>

</body>
</html>
