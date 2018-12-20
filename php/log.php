<?php
include("connessionedb.php");
session_start();


 if($_SERVER["REQUEST_METHOD"] == "POST") {

    $user=$_POST["name"];
    $pass=$_POST["pass"];

    $sql = "SELECT email FROM users WHERE email = '$user' and password = '$pass'";

    $result = mysqli_query($DB,$sql);
    $count = mysqli_num_rows($result);

  if($count == 1 && ($user!="" && $pass!="")) {//controllo che il risultato della query sia di un solo elemento

     $_SESSION["user"] = $user;
     $DB->close();

     header("location: ../home.php");
  }else {

     $error = "Your Username or Password is invalid";
      $_SESSION["errore"] = $error;
      $DB->close();

         header("location: ../login.php");
  }
}

?>
