<?php
// $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=loavertex', 'root', '');

$dsn = 'mysql:host=127.0.0.1;dbname=youtubewebapp';
$user = 'root';
$password = '';

$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];

    // try/catch to show any errors messaages for development ( should change for PRODUCTION )
    try {
        $pdo = new PDO($dsn, $user, $password, $options);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }

?>