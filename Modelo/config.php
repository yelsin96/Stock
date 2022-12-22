<?php
define('USER', 'bodega');
define('PASSWORD', 'a3c2b3bf7d');
define('HOST', '172.20.1.92');
define('DATABASE', 'bodega');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>