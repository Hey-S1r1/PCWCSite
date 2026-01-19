<?php
    $dbname = 'site_files';
    $servername = 'localhost';
    $username = 'bruh';
    $password = 'm4nh8ANc_f8';
        
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(PDO::ATTR_TIMEOUT, 5);

        $stmt = $conn->query("SELECT DATABASE() as db, USER() as user, @@socket as socket");
        $result = $stmt->fetch();
    } catch(PDOException $e) {
        $_SESSION['error'] = "Database connection failed: " . $e->getMessage();
    }
