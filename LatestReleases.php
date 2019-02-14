
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Latest Movies Relesed Netmovies</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="./css/general.css"/>
<link rel="stylesheet" type="text/css" href="./css/home.css"/>
<link rel="stylesheet" type="text/css" href="./css/cerca.css"/>
<link rel="stylesheet" type="text/css" href="./css/stampa.css" media="print"/>
<script type="text/javascript" src="./js/netmovies.js"></script>
</head>
<body>
<?php include './html/header.php';?>
<main id="main">
<noscript class="mobilens">The content can't be scrolled and the menu is not function is not accessible if you disabled the javascript</noscript>
<h1>Last Releases for:</h1>
<?php

require_once("./php/phpfunctions.php");
LatestReleases();
add();
remove();

	?>
</main>
<?php include './html/footer.html';?>
</body>
</html>
