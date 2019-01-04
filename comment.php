<?php

require 'db_conn.php';
require 'error.php';
$dbconn = dbconn();

$isReply = $_GET['isreply'];
$postID = $_GET['id'];

// Checks if comment is an answer to another comment.
if($isReply > 0) {
    $commentID = $_GET['whichcomment'];
    $content = filter_input(INPUT_GET, 'reply', FILTER_SANITIZE_SPECIAL_CHARS);
    $post = null;
    $cmnt = $commentID;
    $strlen = strlen($content);
    if($strlen>0) {
        $stmt = $dbconn -> prepare('
            INSERT INTO comments (content, post_fk, comment_fk) VALUES (:con, :pos, :com)
        ');

        $stmt -> bindParam(':con', $content);
        $stmt -> bindParam(':pos', $post);
        $stmt -> bindValue(':com', $cmnt);
        $stmt -> execute();
        $url = 'index.php?ID=' . $postID;
        header('Location: '. $url);
    }
    else {
           echo "Oops! Check to see that all the fields were filled. <img src='https://thumbs.gfycat.com/ChiefSnappyHyracotherium-small.gif'>";
    }
    

}

// Handles comments that aren't replies.
else {
    $content = filter_input(INPUT_GET, 'commentinput', FILTER_SANITIZE_SPECIAL_CHARS);
    $cmnt = null;
    $strlen = strlen($content);
    if($strlen>0) {
        $stmt = $dbconn -> prepare('
        INSERT INTO comments (content, post_fk, comment_fk) VALUES (:con, :pos, :com)
        ');
        
        $stmt -> bindParam(':con', $content);
        $stmt -> bindParam(':pos', $postID);
        $stmt -> bindValue(':com', $cmnt);
        $stmt -> execute();
        $url = 'index.php?ID=' . $postID;
        header('Location: '. $url);
    }
    else {
        $return = "index.php?ID=" . $postID;
        error($return);
    }
}

        


?>