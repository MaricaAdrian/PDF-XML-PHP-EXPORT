<?php

include_once "settings.php";


$query = mysqli_query($db, "SELECT * FROM `posts`");

$xml = new DOMDocument('1.0', 'UTF-8');

$xmlRoot = $xml->createElement("posts");
$xmlRoot = $xml->appendChild($xmlRoot);

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
    $title = $row['title'];
    $content = $row['content'];
    $author = $row['author'];
    $id = $row['id'];


    $currentPost = $xml->createElement("currentPost");
    $currentPost = $xmlRoot->appendChild($currentPost);

    $currentPost->appendChild($xml->createElement('id', $id));
    $currentPost->appendChild($xml->createElement('title', $title));
    $currentPost->appendChild($xml->createElement('content', $content));
    $currentPost->appendChild($xml->createElement('author', $author));


}

$xml->save("../documents/xml/xmlall.xml");

echo "All XML have been generated to one file into document folder (Name: xmlall.xml).";


?>
