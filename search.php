<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"></meta>
<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
<title>NetMovies-Home</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
<link rel="stylesheet" type="text/css" href="./css/general.css"></link>
<link rel="stylesheet" type="text/css" href="./css/home.css"></link>
<link rel="stylesheet" type="text/css" href="./css/cerca.css"></link>
<script type="text/javascript" src="./js/netmovies.js"></script>
</head>
<body>
<?php include './html/header.html';?>
<main id="main">
<?php
include("./php/connessionedb.php");
require_once("./php/phpfunctions.php");
search();
 ?>
</main>
<?php include './html/footer.html';?>
</body>
</html>
