<?php

    $url = $_SERVER['HTTP_HOST'];

//    database configuration
    $dbHost = 'localhost';
    $dbUsername = 'd0327b5a';
    $dbPassword = 'Pr793nQyhmz9ZcGV';
    $dbName = 'd0327b5a';
    
//  connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    $searchTerm2 = utf8_decode($_GET['term']);
    $searchTerm = strtolower($searchTerm2);



    /*$query = $db->query("SELECT * FROM  tl_search_index WHERE word LIKE '%".$searchTerm."%' GROUP BY word ORDER BY word ASC LIMIT 10");*/
    $query = $db->query("SELECT * FROM tl_search_index sei JOIN tl_search se ON se.id = sei.pid WHERE word LIKE '%".$searchTerm."%' AND se.url LIKE '%".$url."%' GROUP BY sei.word ORDER BY sei.word ASC LIMIT 10");

    	while ($row = $query->fetch_assoc()) {
        	$data[] = utf8_encode($row['word']);
    	}

	echo json_encode($data);
?>