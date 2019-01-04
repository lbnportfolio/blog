<?php
ob_start();
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
require 'top.php';
require 'feed.php';
require 'blogpost.php';
require 'header.php';
require 'footer.php';
require 'bottom.php';
require 'newpost.php';
require 'loginpage.php';
require 'posts.php';

/**
 * Displays different pages depending on the URL.
 */

if(isset($_GET['ID'])) {
  top();
  pageHeader();
  blogPost();
  footer();
  bottom();
}
else if(isset($_GET['page']) && $_GET['page']=="login") {
  top();
  pageHeader();
  loginPage();
  footer();
  bottom();
}
else if(isset($_GET['page']) && $_GET['page']=="newpost") {
  top();
  pageHeader();
  newPost();
  footer();
  bottom();
}
else if(isset($_GET['page']) == "logout") {
  $_SESSION = array();
  session_destroy();
  session_regenerate_id(true);
  header("Location: index.php");
}
else if(!isset($_GET['page'])) {
  top();
  pageHeader();
  posts();
  footer();
  bottom();
}


 ?>
