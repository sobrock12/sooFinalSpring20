<?php
    
    $dsn = 'mysql:host=localhost;dbname=api';
    $username = 'root';

        try {
            $db = new PDO($dsn, $username);
        } catch (PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
        exit();
        }

?>