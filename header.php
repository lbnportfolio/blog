<?php

session_start();



function pageHeader(){

  if(isset($_SESSION['username'])) {  
 ?>
<div class="wrapper">


<div id="header">
  <ul id="nav">
    <li id="title"><a href="index.php"><h1>THE BLOG</h1></a></li>
    <li><a href="index.php?page=newpost">New post</a> </li>
    <li><a href="index.php?page=logout">Log out</a></li>
  </ul>
</div>


 <?php
 }
 else if(!isset($_SESSION['username'])) {
   ?>


  <div class="wrapper">


<div id="header">
  <ul id="nav">
    <li id="title"><a href="index.php"><h1>THE BLOG</h1></a></li>
    <li><a href="index.php?page=login">Login</a> </li>
  </ul>
</div>

<?php
 }
 } ?>
