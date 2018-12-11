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
<script type="text/javascript" src="./js/netmovies.js"></script>
</head>
<body>
<?php include './html/header.html';?>

<main id="main">
<noscript class="mobilens">The content can't be scrolled and the menu is not function is not accessible if you disabled the javascript</noscript>
<h1>Last Releases &rarr; <a href="ultimeuscite.html">see all</a></h1>
<div class="tagmedias">
<ul id="ultimeuscite" class="listamedia">
<?php 
require_once("./php/connessionedb.php");
$sci="SELECT idM,title,poster,ftime,rating FROM `movies` WHERE tag COLLATE UTF8_GENERAL_CI LIKE '%SCI-FI%' LIMIT 5;";
 $result=$DB->query($sci);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
			$rat=$row["rating"];
			$norat=5-$row["rating"];
			echo "
<li class='media currentItem'>
			<a href='media.php?m=".rawurlencode($row["idM"])."' title='".rawurlencode($row["title"])."'><img class='copertina' src='./immagini/copertina/".$row["poster"]."'/> </a> 
<div class='info'>
				<span class='titolo'>Avengers infinity war</span>
		<footer class='mediafooter'>
					<span class='durata'>".$row["ftime"]."</span>
						<div class='rating'>";
						while($rat)
						{
							echo "<span class='fa fa-star checked'></span>";
							$rat--;
						}
						while($norat)
							{echo"<span class='fa fa-star'></span>";
								$norat=$norat-1;
							};
					echo"</div>
		<div class='buttons'>
		<button type='onclick' class='aggiungi'>&#43;</button>
		<button type='onclick' class='aggiungi'>-</button>
		</div>
	</footer>
</div>
</li>
";
	};
};
	?>
	</ul>
	</div>
</main>
<?php include './html/footer.html';?>
</body>
</html>