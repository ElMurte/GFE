<?php
require_once("./php/phpfunctions.php");
sessionPage();
	?>
	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
 <head>
 <meta charset="UTF-8"></meta>
 <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
 <title>NetMovies-Welcome</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"></link>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
 <link rel="stylesheet" type="text/css" href="./css/general.css"></link>
 <link rel="stylesheet" type="text/css" href="./css/welcome.css"></link>
 </head>
 <body>
   <?php include './html/header.php';?>
   <main id="main">

   </main>

 <div id="userPhoto"><img src="immagini/user.png" id="usphoto" alt="user photo" /></div>
<div class="userlink">
 <h1>Welcome <?=$_SESSION['user']?></h1>
 <h1><?=$_SESSION['message']='you are now registered'?></h1>

  <p><a href="home.php">Go to HomePage</a></p>
  <p><a href="account.php">Go to your Account</a></p>
</div>

 <?php
 include("./html/footer.html");
 	?>
 </body>

 </html>
