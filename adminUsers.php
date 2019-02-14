<?php
require_once("./php/phpfunctions.php");
sessionadmin();
	?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>NetMovies-Home</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="./css/general.css"/>
<link rel="stylesheet" type="text/css" href="./css/admin.css"/>

<script type="text/javascript" src="./js/netmovies.js"></script>
</head>
<body>
<?php include './html/header.php';?>
<main id="main">

<div id="adminMenu">
	<ul>
		<li><a href="adminMovies.php">movies</a></li>
		<li><a href="adminUsers.php">users</a></li>
		<li><a href="adminInsertM.php">insert movie</a></li>

		<li>
			<form name="ricerca" method="get" action="adminUsers.php" >
				<form  name="ricercaAdmin" method="get" action="adminMovies.php">
				<input class="inputricerca" type="text" placeholder="search for title,categories..." title="Input search" id="searchAdmin" name="searchAdmin" aria-label="SearchAdmin"></input>
				<button type="submit" class="bottonericerca" title="button search" aria-label="searchAdminButton"><i class="fa fa-search"></i></button>
			</form>
		</li>

	</ul>
</div>
<div id="adminListMovies">

	<?php
	require_once("./php/phpfunctions.php");
	listUser();
	removeUser();
		?>
</div>

</main>
<?php include './html/footer.html';?>
</body>
</html>
