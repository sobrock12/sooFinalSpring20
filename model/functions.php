<?php

        //get quotes
        function get_all_quotes() {
            global $db;
            $query = 'SELECT Q.quoteID, Q.text, A.authorName, C.categoryName
            FROM quotes Q 
            LEFT JOIN authors A ON Q.authorId = A.authorId 
            LEFT JOIN categories C ON Q.categoryId = C.categoryId  
            ORDER BY Q.quoteID ASC';

        //prepare statement
        $statement = $db->prepare($query);

        //execute
        $statement->execute();

        $all_quotes = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $all_quotes;
        
    }