<?php session_start(); include "navbar.php";?>
<!DOCTYPE html>
<html>
    <head>
        <title>Submit Your Work!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div id="form_div">
            <h2>Want to be featured? Fill out your form below!</h2>
            <h3>Accepting short stories and poetry for now. <b>PDFs only.</b></h3>
            <form enctype="multipart/form-data" action=".\\control.php" id="submissions-form" method="POST">
                <div class="form_elem">
                    <label class="form_label">Upload your file<input name="file" type="file" accept=".pdf" required/></label>
                </div>
                <div class="form_elem">
                    <label class="form_label">Author name<input name="author" required/></label>
                </div>
                <div class="form_elem">
                    <label class="form_label">Title of work<input name="title" required/></label>
                </div>
                <div class="form_elem">
                    <label class="form_label">Short description (optional)<input name="description"/></label>
                </div>
                <div class="form_elem">
                    <label class="form_label">Content warnings (optional)<input name="contentwarnings"/></label>
                </div>
                <button name="submit_docs_button" type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>