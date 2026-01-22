<?php
    include "navbar.php";
    $link = htmlspecialchars($_GET['link']);
    $title = htmlspecialchars($_GET['title']);
    $author = htmlspecialchars($_GET['author']);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Purdue CWC: About Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <h1><?= $title; ?></h1>
        <h2><?= $author; ?></h2>
        <embed src="<?= $link; ?>" width="500" height="375" type="application/pdf">
    </body>
</html>