<?php


try{
  $conn = new PDO("mysql:host=localhost;dbname=hotelsite;charset=utf8mb4","root","");
}catch(PDOException $e){
  echo $e->getMessage();
}

?>
