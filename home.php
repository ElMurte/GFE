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
<li class="media currentItem">
<a href="media.html"><img class="copertina" src="./immagini/copertina/avengers infinity war.jpg"/></a>
<div class="info">
<span class="titolo">Avengers infinity war</span>
	<footer class="mediafooter">
					<span class="durata">2:49 </span>
			<div class="rating">
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star"></span>
			</div>
		<div class="buttons">
		<button type="onclick" class="aggiungi">&#43;</button>
		<button type="onclick" class="aggiungi">-</button>
		</div>
	</footer>
</div>
</li>
</ul>
<button type="onclick" class="scroll left">&lt;
</button>
<button type="onclick" class="scroll right">&gt;
</button>
</div>

<h1>My list &rarr; <a href="ultimeuscite.html">See my list</a></h1>
<div class="tagmedias">
<ul id="ultimeuscite" class="listamedia">
<li class="media currentItem">
<a href="media.html"><img class="copertina" src="./immagini/copertina/avengers infinity war.jpg"/></a>
<div class="info">
<span class="titolo">Avengers infinity war</span><span class=""></span>
<footer class="mediafooter">
<span class="durata">2:49 </span>
<div class="rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span></div>
<div class="buttons"><button type="onclick" class="aggiungi">&#43;</button><button type="onclick" class="aggiungi">-</button></div>
</footer>
</div>
</li>
<li class="media">
<a href="media.html"><img class="copertina" src="./immagini/copertina/chappie.jpg"/></a>
<div class="info">
<span class="titolo">Chappie</span>
<footer class="mediafooter">
<span class="durata">2:49 </span>
<div class="rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span></div>
<div class="buttons"><button type="onclick" class="aggiungi">&#43;</button><button type="onclick" class="aggiungi">-</button></div>
</footer></div>
</li>
<li class="media">
<a href="media.html"><img class="copertina" src="./immagini/copertina/lotr.jpg"/> </a>
<div class="info">
<span class="titolo">LOTR:The return of the king</span>
<footer class="mediafooter">
<span class="durata">2:49 </span>
<div class="rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span></div>
<div class="buttons"><button type="onclick" class="aggiungi">&#43;</button><button type="onclick" class="aggiungi">-</button></div>
</footer></div>
</li>
<li class="media">
<a href="media.html"><img class="copertina" src="./immagini/copertina/interstellar.jpg"/> </a>
<div class="info">
<span class="titolo">Interstellar</span>
<footer class="mediafooter">
<span class="durata">2:49 </span>
<div class="rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span></div>
<div class="buttons"><button type="onclick" class="aggiungi">&#43;</button><button type="onclick" class="aggiungi">-</button></div>
</footer></div>
</li>
<li class="media">
<a href="media.html"><img class="copertina" src="./immagini/copertina/the cloverfield paradox.jpg"/> </a>
<div class="info">
<span class="titolo">The cloverfield Paradox</span>
<footer class="mediafooter">
<span class="durata">2:49 </span>
<div class="rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span></div>
<div class="buttons"><button type="onclick" class="aggiungi">&#43;</button><button type="onclick" class="aggiungi">-</button></div>
</footer>
</div>
</li>
</ul>
<button type="onclick" class="scroll left">&lt;
</button>
<button type="onclick" class="scroll right">&gt;
</button>
</div>
</main>
<?php include './html/footer.html';?>
</body>
</html>