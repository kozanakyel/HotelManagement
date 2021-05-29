<?php
  session_start();

  session_destroy();
  header("Location:loginmng.php?status=exit");
?>
