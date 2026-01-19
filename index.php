<?php include "navbar.php"?>
<!DOCTYPE html>
<html>
    <head>
        <title>Purdue Creative Writing Club: Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>
      <div class="container-fluid">
        <?php if (isset($_SESSION["message"])) : ?>
          <h5 class="alert alert-success"><?= $_SESSION["message"]; ?></h5>
        <?php unset($_SESSION["message"]); endif; ?>
        <div class="jumbotron">
          <h1>Welcome to the Purdue Creative Writing Club's Website!</h1>
          <p>We hope you enjoy your stay.</p>
        </div>
        <h1>Who are we?</h1>
        <p>We are the Creative Writng Club at Purdue!</p>
        <h2>What do we want?</h2>
        <p>Funding!</p>
        <h2>When do we want it?</h2>
        <p>Now!</p>
        <iframe src="https://calendar.google.com/calendar/embed?src=cwc.purdue%40gmail.com&ctz=America%2FIndiana%2FIndianapolis" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
      </div>
    </body>
</html>