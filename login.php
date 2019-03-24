<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8"></meta>
<meta name="viewport" content="width=device-width, initial-scale=1"></meta>

<title>NetMovies-Login</title>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
<link rel="stylesheet" type="text/css" href="./css/general.css"></link>
<link rel="stylesheet" type="text/css" href="./css/login.css"></link>
<script type="text/javascript" src="./js/netmovies.js"></script>

</head>
<body>
	<?php
	require_once("./php/phpfunctions.php");
	sessionLogin();
		?>
<div id="logologin">
  <a href="home.php"><img src="immagini/logolog.jpg" id="loginlogo" alt="Logo NetMovies" /></a>
</div>

<div id="form_accedi">
  <h1>Login</h1>
  <form name="login" action="login.php" method="post" onsubmit="return LoginValidation()">
    <div class="container">
      <label for="username" ><span class="fieldTitle">Username</span></label><input type="text" placeholder="Enter Username" id="username" name="username"/>
      <p ><span id="error_U" class="errore"></span></p>
      <label for="pass" ><span class="fieldTitle">Password</span></label><input type="password"  placeholder="Enter Password" id="pass" name="pass" />
			<p ><span id="error_P" class="errore"></span></p>
      <button type="submit">Login</button>
      <p class="errore">
          <?php
          logi();
            ?>
      </p>
    </div>
    <div id="registra">
      <p class="Sign">are you new?<a href="Sign.php">Sign in</a></p>
    </div>
  </form>
</div>

<?php include './html/footer.html';?>

</body>

</html>
