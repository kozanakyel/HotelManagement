<?php


try{
  //$conn = new PDO("mysql:host=eu-cdbr-west-01.cleardb.com;dbname=heroku_336069692980e83;charset=utf8mb4","b58f0f3a8583cb","1ec4cdaa");
  $conn = new PDO("mysql:host=localhost;dbname=hotelsite;charset=utf8mb4","root","");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}

?>
