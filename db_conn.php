<?php

function dbconn() {
  try {
    $PDOobject = new PDO('mysql:host=någonhost och databasnamn;charset=utf8', 'någotanvändarnamn','någotlösenord');
    $PDOobject->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $PDOobject->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo 'ERROR ' . $e->getMessage();
  }
  return $PDOobject;

}


 ?>
