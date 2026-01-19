<?php
echo "<h2>MySQL Debug Test</h2>";

// Test different connection methods
$tests = [
    ['127.0.0.1:3306', 'mysql:host=127.0.0.1;port=3306;dbname=site_files'],
    ['localhost:3306', 'mysql:host=localhost;port=3306;dbname=site_files'],
    ['localhost socket', 'mysql:host=localhost;dbname=site_files'], // will try socket
    ['IP without port', 'mysql:host=127.0.0.1;dbname=site_files'],
];

$username = 'bruh';
$password = 'password';

foreach ($tests as $test) {
    echo "<h3>Testing: {$test[0]}</h3>";
    echo "DSN: {$test[1]}<br>";
    
    try {
        $pdo = new PDO($test[1], $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => 3
        ]);
        
        $stmt = $pdo->query("SELECT USER() as user, @@version as version");
        $result = $stmt->fetch();
        echo "✓ SUCCESS!<br>";
        echo "User: " . $result['user'] . "<br>";
        echo "MySQL Version: " . $result['version'] . "<br>";
        
    } catch (PDOException $e) {
        echo "✗ FAILED: " . $e->getMessage() . "<br>";
        echo "Error Code: " . $e->getCode() . "<br>";
    }
    
    echo "<hr>";
}

// Test command line connection
echo "<h3>Command Line Test</h3>";
echo "<pre>";
system("mysql -u bruh -ppassword -e 'SELECT USER(), VERSION()' 2>&1");
echo "</pre>";

// Test socket path
echo "<h3>Socket Check</h3>";
$socket_path = '/var/run/mysqld/mysqld.sock';
if (file_exists($socket_path)) {
    echo "✓ Socket exists: $socket_path<br>";
    echo "Permissions: " . substr(sprintf('%o', fileperms($socket_path)), -4) . "<br>";
    echo "Size: " . filesize($socket_path) . " bytes<br>";
} else {
    echo "✗ Socket not found: $socket_path<br>";
    
    // Check other possible locations
    $possible_sockets = [
        '/tmp/mysql.sock',
        '/var/lib/mysql/mysql.sock',
        '/run/mysqld/mysqld.sock'
    ];
    
    foreach ($possible_sockets as $sock) {
        if (file_exists($sock)) {
            echo "Found alternative socket: $sock<br>";
        }
    }
}