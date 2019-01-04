<?php

function blogPost() {
  $id = $_GET['ID'];
  
  if(isset($_GET['ID'])){
    require 'db_conn.php';
    $db = dbconn();  
    
    $whichPost = $db->query("SELECT * FROM articles WHERE id_pk='$id'");
    
    
    


    foreach($whichPost as $lmao) {
      echo <<<POST
 <div id="postwrap">     
 <div id="post">
   <h2 id="posttitle">{$lmao['title']}</h2>
   <p id="posttext">{$lmao['content']}</p>
POST;
    }
  }
  commentFunction($id, $db);
}

function commentFunction($id, $db) {
$id = $id;

echo <<<COMMENT
<h3><a href='#/' id='showcomments'>Show comments</a></h3>
<div id="postcomments">
    <form id="commentform" action="comment.php" method="get">
      <input type="hidden" name="id" value="{$id}">
      <input type="text" name="commentinput" placeholder="Comment">
      <input type="hidden" name="isreply" value="0">
      <button type="submit" name="submitcomment">Post</button>
    </form>    
COMMENT;

$comments = $db->query("SELECT * FROM comments WHERE post_fk = $id");
$i = 0;
commentLoop($id, $comments, $db, $id, $i);
}
function commentLoop($parent, $comments, $db, $id, $i) {
  foreach($comments as $comment) {
    echo "<div class='lmao'><div class='commentcont'>" . $comment['content'];
    echo "<form action='comment.php' method='get' class='replyform'>
            <input type='hidden' name='id' value='{$id}'>
            <input type='text' name='reply' placeholder='Reply to comment'>
            <input type='hidden' name='whichcomment' value={$comment['commentid_pk']}>
            <input type='hidden' name='isreply' value='1'>
            <button type='submit' name='replysubmit'>post</button>
          </form></div>";
    $parent = $comment['commentid_pk']; 
    $test = $db->query("SELECT * FROM comments WHERE comment_fk = '$parent'"); 
    commentLoop($parent, $test, $db, $id, $i);
  }
  echo "</div>";
}

 ?>