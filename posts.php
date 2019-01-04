<?php
function posts() {

require 'getarticlesmodel.php';
require 'showposts.php';

$results = getArticles();

showPosts($results);

}
?>