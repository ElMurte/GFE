<?php
require_once("./php/phpfunctions.php");
sessionPage();
	?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>NetMovies-Account</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="./css/general.css"/>
<link rel="stylesheet" type="text/css" href="./css/account.css"/>
</head>
<body>

<?php include './html/header.php';?>
<main id="main">
<noscript class="mobilens">The content can't be scrolled and the menu is not function is not accessible if you disabled the javascript</noscript>
</main>
<?php
	$row=profileUser();
			?>

<div id="form_acc">
<form name="accinfo" id="accinfo" action="editprofile.php" method="post" >
<div class="container">
<div id="photous">
<img src="./immagini/userdefault.png" id="photo" alt="photouser"/></div>
  <h1> My Account</h1>
  <p> First Name: <?php echo $row['name']; ?> </p>
  <p> Last Name: <?php echo $row['surname']; ?> </p>
  <p> Username: <?php echo $row['username']; ?> </p>
  <p> Email: <?php echo $row['email']; ?> </p>
  <p> Password: <?php echo $row['password']; ?> </p>
  <div class="pulsante">  <button type="submit" name="edit">Edit Your Account</button></div>

</div>
</form>
</div>





<?php include './html/footer.html';?>
</body>
</html>
