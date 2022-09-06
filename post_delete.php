<?php
require_once('database/db_connect.php');

if ( isset($_POST['delete']) && isset($_POST['id']) ) {

    $sql = "DELETE FROM users WHERE id = :id";
    // echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_POST['id']
    ));

    header('location: /pdo_statements.php');
};

?>