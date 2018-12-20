<?php
   include("connessioneDB.php");
   session_start();

   if(!isset($_SESSION["user"])){//se non c'è la sessione ti tiporto a login.php
      header("location:login.php");
   }
?>
