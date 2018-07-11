<?php
include_once "settings.php";

        if (!isset($_SESSION['username']))
        {
                redirect("admin/login.php");
        }


        if(isset($_GET['id']))
        {

                $query = mysqli_query($db, "DELETE FROM `posts` WHERE id= '".$_GET['id']."'");

                if(mysqli_affected_rows($db))
                {
                        echo "Your article has been deleted successffully!";
                        $log = "Admin " . $_SESSION['username'] . " has deleted an article (ID: ".$_GET['id'].") - " . date("d-m-Y H:i:s");
                        $query = mysqli_query($db, "INSERT INTO `logs`(user, content, date) VALUES ('".$_SESSION['username']."', '".$log."', NOW())");
                } else {
                        echo mysqli_error($db);
                }

        }






?>
