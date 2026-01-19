<?php
session_start();
include 'connection.php';
if (!isset($conn) || $conn === null) {
    die('Database connection failed');
}

if (isset($_POST['submit_docs_button']))
{
    $title = $_POST["title"];
    $author = $_POST["author"];
    $description = $_POST["description"] ?? "";
    $content_warnings = $_POST["contentwarnings"] ?? "";

    $data = sprintf("t: %s a: %s d: %s c: %s", $title,
                    $author, $description, $content_warnings);

    $s = $conn->prepare("insert into documents 
        (title, author, description, link, content_warnings)
        values (:title, :author, :description, :link, :content_warnings)");
    $s->bindParam(":title", $title);
    $s->bindParam(":author", $author);
    $s->bindParam(":description", $description);

    $upload_dir = "./src/";

    $original_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    $suffix = basename($original_name);
    $new_loc = $upload_dir.$suffix;
    move_uploaded_file($tmp_name, $new_loc);

    $s->bindParam(":link", $new_loc);
    $s->bindParam(":content_warnings", $content_warnings);

    $res = $s->execute();

    if($res)
    {
        $_SESSION['message'] = 'Upload successful!';
        header('Location: index.php');
        exit(0);
    }
}
