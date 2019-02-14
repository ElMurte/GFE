<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>NetMovies-Your Profile</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="./css/general.css"/>
<link rel="stylesheet" type="text/css" href="./css/account.css"/>
<script type="text/javascript" src="./js/netmovies.js"></script>

   </head>
   <body>
     <?php include './html/header.php';?>
   <main id="main">
   <noscript class="mobilens">The content can't be scrolled and the menu is not function is not accessible if you disabled the javascript</noscript>
   </main>

<div id="editprofile">

  <?php
 $row=profileUser();
   ?>


  <form name="edit" id="edit" action="editprofile.php"method="post">
  <div class="container">

  <div id="photous"> <img src="./immagini/userdefault.png" id="photo" alt="photouser"/></div>
  <h1>My Account</h1>
  <label for="name">First Name:</label>
  <input type="text" placeholder="<?php echo $row['name']; ?>" id="name" name="name" />
  <p><span id="error_name" class="errore"></span></p>
  <label for="surname">Last Name:</label>
  <input type="text" placeholder="<?php echo $row['surname']; ?>" id="surname" name="surname"/>
  <p><span id="error_lname" class="errore"></span></p>
  <label for="username">Username:</label>
  <input type="text" placeholder="<?php echo $row['username']; ?>" id="username" name="username"/>
  <p><span id="error_uname" class="errore"></span></p>
  <label for="email">Email:</label>
  <input type="text" placeholder="<?php echo $row['email']; ?>" id="email" name="email" />
  <p><span id="error_email" class="errore"></span></p>
  <label for="pass">Password:</label>
  <input type="password" placeholder="<?php echo $row['password']; ?>" id="pass" name="pass" />
  <p><span id="error_pass" class="errore"></span></p>
  <div class="pulsante">  <button type="submit" name="update" onclick="return val()">Update Account</button>
  <button type="submit" name="delete">Delete Account</button></div>
  </div>
</form>
</div>

  <?php
      if(isset($_POST["update"]))
             {
               update();
           }

           else if(isset($_POST["delete"]))
                  {
          UserdeleteAccount($row['username']);
		  
              }
?>




   <?php include './html/footer.html';?>
   </body>
   </html>
