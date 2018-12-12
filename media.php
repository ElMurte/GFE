<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>NetMovies-Home</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="./css/general.css"/>
<link rel="stylesheet" type="text/css" href="./css/home.css"/>
<link rel="stylesheet" type="text/css" href="./css/media.css"/>
<script type="text/javascript" src="./js/netmovies.js"></script>
</head>
<body>
<?php include './html/header.html';?>
<main id="main">
	<div class="vmedia">
	<h1>title:Chappie year:2014</h1>
	<video class="mediavideo" poster="./immagini/copertina/chappie.jpg" controls>
	  <source src="./video/chappie.mp4" type="video/mp4">
	   Your browser does not support the video tag.
	</video>
	</div>
		<div class="imgmedia">
			<div class="plot">
			<h2>Movie Plot</h2>
			<h3>
			 Narcos: Mexico explores the origins of the modern drug war by going back to a time when 
			 the Mexican trafficking world was a loose and disorganized confederation of 
			 independent growers and dealers. The series charts the rise of the Guadalajara Cartel 
			 in the 1980s as Félix Gallardo (Diego Luna) takes the helm, unifying traffickers in order 
			 to build an empire.
			 </h3>
			 </div>
			 <div class="desc">
			 <h2>Cast:</h2>
					  <h3>
					  author:<br>
					  main actors:<br>
					  categories:<br>
					  ...
					  </h3>
			</div>
		</div>
</main>
<script>
function myFunction() {
    var x = document.getElementById("listamenu");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script> 
<?php include './html/footer.html';?>
</body>
</html>