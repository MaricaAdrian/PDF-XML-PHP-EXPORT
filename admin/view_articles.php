<?php
include_once "settings.php";

?>



<!DOCTYPE html>
<html>
<head>

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/bootstrap.min.css"; ?>">
    <title>View all articles</title>
</head>
<body>

    <?php
    include_once "header.php";
    ?>





    <div class="container"  style="font-family: 'Oswald', sans-serif;">
        <div>

        </div>

        <?php
        $query = mysqli_query($db, "SELECT * FROM `posts`");

        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {

            $title = $row['title'];
            $author = $row['author'];
            $content = $row['content'];
            ?>
            <div class="col-12  border-bottom" style="margin-top:20px;  font-family: 'Oswald', sans-serif;"  >
                <h1 class="text-muted text-center"> <?php echo $title; ?></h1>

            </br>
            <p class="text-info" >Author: <?php echo $author; ?></p>
        </br>
        <p>
            <?php echo $content; ?>
        </p>
    </br>
    <?php
    $id = $row['id'];
    ?>

        <div class="d-flex justify-content-around " style="margin-bottom: 15px;" >
            <a class="btn btn-primary btn-lg" href="edit_article.php?id=<?php echo $id; ?>">Edit article</a>
            <div id="actions">
                <a data-xml="<?php echo $id; ?>" class="btn btn-primary btn-lg" href="generate_xml.php?id=<?php echo $id; ?>">Generate XML</a>
                <a data-pdf="<?php echo $id; ?>" class="btn btn-primary btn-lg" href="generate_pdf.php?id=<?php echo $id; ?>">Generate PDF</a>
            </div>
            <a class="btn btn-primary btn-lg" href="delete_article.php?id=<?php echo $id;?>">Delete article</a>
    </div>


</div>
</br>
<?php
}
?>
</div>

<script src="<?php echo BASE_URL . "js/jq.js"; ?>"></script>
<script src="<?php echo BASE_URL . "js/bootstrap.min.js"; ?>"></script>
<script src="<?php echo BASE_URL . "js/admin.js"; ?>"></script>

</body>
</html>
