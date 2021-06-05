<?php


try{
  $conn = new PDO("mysql:host=localhost;dbname=hotelsite;charset=utf8mb4","root","");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}

?>
