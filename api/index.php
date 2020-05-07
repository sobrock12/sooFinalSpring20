<?php

include_once('..//model/database.php');
include_once('..//model/functions.php');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $authorId = trim(filter_input(INPUT_GET, 'authorId'));
        $categoryId = trim(filter_input(INPUT_GET, 'categoryId'));

        if ($authorId == NULL && $categoryId == NULL) {
            $array = $db->query("SELECT Q.quoteID, Q.text, A.authorName, C.categoryName
            FROM quotes Q 
            LEFT JOIN authors A ON Q.authorId = A.authorId 
            LEFT JOIN categories C ON Q.categoryId = C.categoryId  
            ORDER BY Q.quoteID ASC")->fetchAll(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');
            echo json_encode($array);

        } else if ($authorId != NULL && $authorId != 'all' && $categoryId == NULL) {

            $array = $db->query("SELECT Q.quoteID, Q.text, A.authorName, C.categoryName
            FROM quotes Q 
            LEFT JOIN authors A ON Q.authorId = A.authorId 
            LEFT JOIN categories C ON Q.categoryId = C.categoryId  
            WHERE A.authorId = $authorId
            ORDER BY Q.quoteID ASC")->fetchAll(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');
            echo json_encode($array);

        } else if ($authorId == 'all') {

            $array = $db->query("SELECT * FROM authors
            ORDER BY authorId ASC")->fetchAll(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');
            echo json_encode($array);

        } else if ($categoryId != NULL && $categoryId != 'all') {

                $array = $db->query("SELECT Q.quoteID, Q.text, A.authorName, C.categoryName
                FROM quotes Q 
                LEFT JOIN authors A ON Q.authorId = A.authorId 
                LEFT JOIN categories C ON Q.categoryId = C.categoryId  
                WHERE C.categoryId = $categoryId
                ORDER BY Q.quoteID ASC")->fetchAll(PDO::FETCH_ASSOC);
    
                header('Content-Type: application/json');
                echo json_encode($array);
    
            } else if ($categoryId == 'all') {
    
                $array = $db->query("SELECT * FROM categories
                ORDER BY categoryId ASC")->fetchAll(PDO::FETCH_ASSOC);
    
                header('Content-Type: application/json');
                echo json_encode($array);
         
            } else if ($authorId != NULL && $categoryId != NULL) {
                $array = $db->query("SELECT Q.quoteID, Q.text, A.authorName, C.categoryName 
                FROM quotes Q 
                LEFT JOIN authors A ON Q.authorId = A.authorId 
                LEFT JOIN categories C ON Q.categoryId = C.categoryId 
                WHERE C.categoryId = $categoryId && A.authorId = $authorId
                ORDER BY Q.quoteID ASC")->fetchAll(PDO::FETCH_ASSOC);
    
                header('Content-Type: application/json');
                echo json_encode($array);

            
    } else {

        $data = array("message"=>"You did not send a GET or POST request");
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>





