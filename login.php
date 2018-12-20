<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>NetMovies-Login</title>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="./css/general.css"/>
<link rel="stylesheet" type="text/css" href="./css/login.css"/>
</head>
<body>
<div id="logologin">
  <a href="home.php"><img src="css/logolog.jpg" id="loginlogo" alt="Logo NetMovies" /></a>
</div>

<div id="form_accedi">
  <h1>Login</h1>
  <form method="post" action="php/log.php" >
    <div class="container">
      <input type="text" placeholder="Email" name="name" />
      <input type="password" placeholder="Password" name="pass" />
      <button type="submit">Login</button>
      <p class="errore">
          <?php
            session_start();
            /*session_destroy();*/

            if(isset($_SESSION["errore"]))
            {
                echo $_SESSION["errore"];//messaggio di errore nel caso di credenziali errate
            }

            ?>
      </p>
    </div>
    <div id="registra">

      <p>are you new?<a href="#">Sign in</a></p>

    </div>
  </form>
</div>

<footer id="footer">
<ul class="linksfooter">
<li><a href="#">The Company</a></li>
<li><a href="#">Site Map</a></li>
<li><a href="#">Contact Us</a></li>
</ul>
<ul class="linksfooter">
<li><a href="#">Legal Notes</a></li>
<li><a href="#">Conditions of use</a></li>
<li><a href="#">Privacy</a></li>
</ul>
<div class="social-footer-icons">
    <ul class="menu simple">
      <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li><a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
      <li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
    </ul>
	</div>
</footer>

</body>

</html>
