<?php

        require_once 'settings.php';

        if (isset($_SESSION['username']))
        {
                unset($_SESSION['username']);
        }

        redirect("admin/login.php");

 ?>
