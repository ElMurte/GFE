<?php
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
     //distruggo la sessione se l'utente fa il logout
     session_destroy();
     header("Location: ../login.php");

?>
