<div id="header" style="">
        <nav class="navbar navbar-expand-lg justify-content-center navbar-dark bg-white">
                <a class="nav-link bg-white text-dark" href="index.php">HOME</a>
                <!--
                <div class="btn-group">
                        <button  type="button" class="btn btn-default  bg-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Food
                        </button>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">food1</a>
                                <a class="dropdown-item" href="#">food2</a>
                                <a class="dropdown-item" href="https://www.google.ro">food3</a>

                        </div>
                </div> -->
                <div class="btn-group">
                        <button type="button" class="btn btn-default  bg-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                News
                        </button>
                        <div class="dropdown-menu">
                                <?php
                                $query = mysqli_query($db, "SELECT  id, title FROM `posts` ORDER BY id DESC LIMIT 0,3");
                                while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
                                {
                                        $id = $row['id'];
                                        $title =$row['title'];

                                        ?>
                                <a class="dropdown-item" href="<?php echo BASE_URL . "view_post.php?id=" . $id; ?>"><?php echo $title; ?></a>
                                <?php }?>

                        </div>
                            <!-- <a class="nav-link bg-white text-dark" href="aboutus.php">About us</a> -->
                        <a class="nav-link bg-white text-dark" href="contactus.php">Contact us</a>

                </div>
        </nav>
</div>
