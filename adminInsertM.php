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


	</ul>
</div>

<div id="form_InsertMovie">
  <h1>Insert Movie</h1>
		<?php

			adminInsertMovie();
				?>
  <form name="InsertM" action="adminInsertM.php" method="post" enctype="multipart/form-data" onsubmit="return InsertAdminValidation()">
    <div class="container">
      <label for="title" >Title</label><p><input type="text" placeholder="title of film" id="title" name="title"/>
			<span id="error_title" class="errore"></span></p>
			
      <label for="fileToUpload" >Poster</label><p>
	  <input type="file"    name="fileToUpload" id="fileToUpload" />
      <span id="error_poster" class="errore"></span></p>
		<label for="year" >Year Release</label><p>
		<input type="text"  placeholder="enter the year" id="year" name="year" />
        <span id="error_year" class="errore"></span></p>
	<label for="ftime" >Duration film</label><p>
	<input type="text"  placeholder="duratio in the format HH:MM:SS" id="ftime" name="ftime" />
      <span id="error_time" class="errore"></span></p>
		<label for="lang" >Language</label><p>
		<input type="text"  placeholder="Language in the format EN" id="lang" name="lang" />
    	<span id="error_lang" class="errore"></span></p>
<label for="rating" >Rating</label><p>
<input  type="number" min="1" max="5"  placeholder="number between 1 and 5" id="rating" name="rating" />
<span id="error_rating" class="errore"></span></p>
	<label for="tag" >Categories</label><p>
	<input type="text"  placeholder="Insert categories divided by a comma" id="tag" name="tag" />
      <span id="error_tag" class="errore"></span></p>
			<label for="plot" >Plot</label><p><textarea  placeholder="plot of the film" id="plot" name="plot" ></textarea>
			<span id="error_plot" class="errore"></span></p>
      <button type="submit" title="insert movie">Insert</button>
		
    </div>
  </form>
</div>

</main>
<?php include './html/footer.html';?>
</body>
</html>
