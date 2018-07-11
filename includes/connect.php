<?php

        $db = mysqli_connect("localhost", "root", "", "gestionare_produse");

        if (!$db)
        {
                echo "Error connecting to database: " . mysqli_connect_error();
        }


?>
