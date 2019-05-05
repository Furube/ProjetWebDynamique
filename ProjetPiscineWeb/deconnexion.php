<?php
  session_start();
  $_SESSION['email']="A";
  header('Location: http://127.0.0.1/ProjetPiscineWeb/menu_principal.php');
  exit();
?>