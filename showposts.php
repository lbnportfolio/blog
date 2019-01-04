<?php

function showPosts($results) {

    foreach($results as $row) {
        
echo <<<PRT
    <div id="postitem">
    <div>
        <h2 id="posttitle"><a href="index.php?ID={$row['id_pk']}">{$row['title']}</a></h2>
        <a href="index.php?ID={$row['id_pk']}" id="showmore">Show post</a>
    </div>    
    <p id="posttext">{$row['content']}</p>
    </div>
PRT;
    }



}

?>