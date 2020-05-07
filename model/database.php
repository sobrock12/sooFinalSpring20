<?php
    
    $dsn = 'mysql:host=ijj1btjwrd3b7932.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=ftk923rzylpzqsk3';
    $username = 'wune56svj1j0cb9s';
    $pw = 'fb49yc6cjs9wj0uz';

        try {
            $db = new PDO($dsn, $username, $pw);
        } catch (PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
        exit();
        }

?>
