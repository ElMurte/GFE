<?php
     session_start();
     session_unset($_SESSION['username']);
     //distruggo la sessione se l'utente fa il logout
     session_destroy();
     header("Location: ../login.php");

?>
