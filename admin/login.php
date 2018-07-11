<?php

require_once 'settings.php';

        if (isset($_SESSION['username']))
        {
                redirect("admin/index.php");
        }

        if (isset($_POST['submit']))
        {
                        $username = mysqli_escape_string($db, $_POST['username']);
                        $password = mysqli_escape_string($db, $_POST['password']);

                        $query  = mysqli_query($db, "SELECT id FROM admins WHERE username = '".$username."' AND password = '".$password."' ");

                        if (mysqli_num_rows($query))
                        {
                                $_SESSION['username'] = $username;
                                redirect("admin/index.php");
                        }
        }

?>

<!DOCTYPE html>
<html>
<head>
        <title>Admin - Log In</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/bootstrap.min.css"; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/admin.css"; ?>">

</head>
<body>
        <div class="container">
                <div class="col-3 offset-4 text-center" style="margin-top: 100px;">
                        <form method="post" action="login.php">
                                <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Insert your username here" />
                                </div>
                                <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Insert your username here" />
                                </div>
                                <input type="submit" value="Log in" name="submit" class="btn btn-primary" />
                        </form>
                </div>
        </div>
        <script src="<?php echo BASE_URL . "js/jq.js"?>"> </script>
        <script src="<?php echo BASE_URL . "js/bootstrap.min.js"?>"> </script>
</body>
</html>
