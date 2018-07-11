<?php

        if (session_status() == PHP_SESSION_NONE)
                session_start();

        $db = mysqli_connect("127.0.0.1", "root", "", "practica2018");

        if (!$db)
        {
                echo "Connection with database could not be established.";
                exit;
        }

        define ('BASE_URL', "http://" . $_SERVER['SERVER_NAME'] . '/practica' . '/');

        function redirect($redirect_url)
        {
                header("Location: " .  BASE_URL .  $redirect_url);
        }

?>
