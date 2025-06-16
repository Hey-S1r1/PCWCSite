<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="get">
        <label>Email:</label><br>
        <input type="text" name="email"><br>
    </form>
</body>
</html>
<?php
    if (isset($_GET["email"]) && filter_var($_GET["email"], FILTER_VALIDATE_EMAIL) && explode("@", $_GET["email"])[1] == "purdue.edu") {
        $email = $_GET["email"];
        echo $email;
    } else {
        echo "Please enter a purdue.edu email address";
    }
    
?>