<?php
    require 'includes/database_connection/database_connection.php';
    $hostname = 'localhost';
    $username = 'root';
    $userpass = '';
    $tablename = 'cms';
    $newConn = new Database_Connection($hostname, $username, $userpass, $tablename);
    $newConn->printAll();
?>