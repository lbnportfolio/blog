<?php


/**
 * Handles the input of the user's blog post, and uses prepared statements to
 * insert the data into the database.
 */

require 'db_conn.php';
require 'error.php';



$dbob = dbconn();

$title = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$postcontent = filter_input(INPUT_GET, 'postcontent', FILTER_SANITIZE_SPECIAL_CHARS);

if(strlen($title) > 0 && strlen($postcontent) > 0) {
  

$stmt = $dbob -> prepare('
  INSERT INTO articles (title, content) VALUES (:tit, :con)

');

$stmt -> bindParam(':tit', $title);
$stmt -> bindParam(':con', $postcontent);
$stmt -> execute();
header('Location: index.php');


}else {
    $return = "index.php?page=newpost";
    error($return);
}

 ?>
