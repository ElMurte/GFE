<?php
require_once("./php/phpfunctions.php");
sessionLogin();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>NetMovies-Sing in</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="./css/general.css" />
<link rel="stylesheet" type="text/css" href="./css/registrazione.css"/>
<script type="text/javascript" src="./js/netmovies.js"></script>



</head>
<body>
  <div id="logosito">
      <a href="home.php"><img src="immagini/logolog.jpg" id="logo" alt="Logo di Netmovies" />
      </a>
    </div>
	<?php  reg(); ?>
  <div id="form_reg">
   <h1>Sing up</h1>
  	<form name="registration" action="Sign.php" onsubmit="return regval()" method="post" >

  	<div class="formReg">

  	   <label for="name" ><br>First name</br></label><input type="text" placeholder="Enter your First Name*" id="name"name="name"><p><span id="error_name" class="errore"></span></p>
        <label for="surname" ><br>Last name</br></label><input type="text" placeholder="Enter your Last Name*" id="surname"name="surname" ><p><span id="error_lname" class="errore"></span></p>
        <label for="username" ><br>Username</br></label><input type="text" placeholder="Create a Username*" id="username" name="username"><p><span id="error_uname" class="errore">  <?php if(isset($errors["error1"])) echo "<h1> errrore dio can </h1>";?></span></p>
        <label for="email" ><br>Email</br></label><input type="text" placeholder="Enter your E-mail*" name="email" id="email"><p><span id="error_email" class="errore"></span></p>
        <label for="pass" ><br>Password</br></label><input type="password" placeholder="Create password*" id="pass"name="pass"><p><span id="error_pass" class="errore"></span></p>
        <label for="confpass" ><br>Confirm Password</br></label><input type="password" placeholder="Confirm password*" id="confpass" name="confpass"><p><span id="error_confpass" class="errore"></span></p>

      <div id="termini">
  		<input type="checkbox" name="termini" id="Agree" >
      <label for="termini"> I accept the <a href="termini.html" style="color:dodgerblue">Terms of Service </a></label>
  </div>
  		<div id="maggiorene">
  <input type="checkbox" name="maggiorene" value="check" id="Agree2">
  <label for="maggiorene">I declare to have 18 years or over </label></div>
  <p><span id="error_check" class="errore"></span></p>
      <button type="submit" name="create" >Create Account</button>
    <div id="login">  <p>
        Already a member? <a href="login.php">login</a>
      </p></div>
  </div>
</form>
</div>
<?php
include "./html/footer.html";
	?>
</body>
</html>
