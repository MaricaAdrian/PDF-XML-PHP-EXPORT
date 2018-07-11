<?php

    include_once "settings.php";

    if(isset($_GET['id']))
    {
        $id = mysqli_escape_string($db, $_GET['id']);
        $query = mysqli_query($db, "SELECT * FROM `posts` WHERE id='".$_GET['id']."'");

        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $title = $row['title'];
            $content = $row['content'];
            $author = $row['author'];

            $xml = new DOMDocument('1.0', 'UTF-8');

            $xmlRoot = $xml->createElement("posts");
            $xmlRoot = $xml->appendChild($xmlRoot);

            $currentPost = $xml->createElement("currentPost");
            $currentPost = $xmlRoot->appendChild($currentPost);

            $currentPost->appendChild($xml->createElement('id', $id));
            $currentPost->appendChild($xml->createElement('title', $title));
            $currentPost->appendChild($xml->createElement('content', $content));
            $currentPost->appendChild($xml->createElement('author', $author));

            $name = $title[0] . "_" . $id . $title[strlen($title) - 1] . ".xml";

            $xml->save("../documents/xml/" . $name);

            echo "Your XML file has been generated in your document folder (Name: ".$name.").";
            

        }
    }
    else
    {
            redirect();
    }



?>
