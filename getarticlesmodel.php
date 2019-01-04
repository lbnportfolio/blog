<?php

require 'db_conn.php';

/**
 * Retrieves articles/blog posts from the database.
 */
function getArticles(){
    $db=dbconn();


    $results = $db-> query('SELECT * FROM articles ORDER BY id_pk desc');

    return $results;
}

?>