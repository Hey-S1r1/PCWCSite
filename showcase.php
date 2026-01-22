<?php include "navbar.php"; include "connection.php";?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Work</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div id="showcase_header"><h1>Current Showcase</h1></div>
        <div>
            <?php
                $query = "select * from documents where is_featured = true";
                $s = $conn->prepare($query);
                $s->execute();

                $res = $s->fetchAll(PDO::FETCH_OBJ);
                if ($res)
                {
                    foreach($res as $row)
                    {
                        ?>
                            <div class="feature">
                                <!-- When deploying, replace with links to blob in cloud -->
                                <h3><a class="nav-link active" href="story.php?link=<?= $row->link; ?>&title=<?= $row->title; ?>&author=<?= $row->author; ?>"><?= $row->title; ?></a></h3>
                                <h4>By <?= $row->author; ?></h4>
                                <p>Description: <?= $row->description?></p>
                                <?php if(empty($row->content_warnings))
                                    { echo ("<p>Content Warnings: None</p>");}
                                    else {
                                        echo ("<p>Content Warnings: $row->content_warnings</p>");
                                }?>
                            </div>     
                        <?php
                    }
                }
                else {
                    ?>
                    <p>Skill issue</p>
                    <?php
                }
                ?>
        </div>
    </body>
</html>