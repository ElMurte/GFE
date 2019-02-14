<?php
require_once("./php/phpfunctions.php");
sessionPage();
	?>
<a href="#main" class="nonvedente">Vai al contenuto</a>
<header id="header">
	<div id="logosito">
	 <a  href="home.php"><img class="logoheader" src="./immagini/logoN.png" alt="Netmovies logo"/> </a>
	 </div>
			<div  id="navbar">
					<div class="topnav" id="listamenu">
						<a class="menulink" href="home.php">Home</a>
						<div tabindex="0" class="sottmenuheader menulink onclick-menu"> <a href="#sub1" class="submenutoggler">Categories</a>
								<ul class="onclick-menu-content ilsottomenu" id="sub1">
								<li><a href="search.php?search=Action">Action</a></li>
								<li><a href="search.php?search=Adventure">Adventure</a></li>
								<li><a href="search.php?search=Autobiography">Autobiography</a></li>
								<li><a href="search.php?search=Cartoons">Cartoons</a></li>
								<li><a href="search.php?search=Classic">Classic</a></li>
								<li><a href="search.php?search=Comedy">Comedy</a></li>
								<li><a href="search.php?search=Documentary">Documentary</a></li>
								<li><a href="search.php?search=Drama" >Drama</a></li>
								<li><a href="search.php?search=Fantascience" >Fantascience</a></li>
								<li><a href="search.php?search=Fantasy">Fantasy</a></li>
								<li><a href="search.php?search=History">History</a></li>
								<li><a href="search.php?search=Romantic">Romantic</a></li>
								<li><a href="search.php?search=SCI-FI">SCI-FI</a></li>
								<li><a href="search.php?search=Sport">Sport</a></li>
								<li><a href="search.php?search=Thriller">Thriller</a></li>
								</ul>
						</div>
						<a class="menulink" href="LatestReleases.php">Latest Releases</a>
						<a class="menulink" href="mylist.php">My List</a>
						<?php
						checkAd();
							?>
							<a href="javascript:void(0);" class="icon" onclick="myFunction()">
							<i class="fa fa-bars"></i>
							</a>
					</div>
			</div>
				<div class="topright">
				<div class="barraricerca">
					<form name="ricerca" method="get" action="search.php" onsubmit="return SearchValidation()">
					<input class="inputricerca" type="text" placeholder="search for title,categories..." title="Input search" id="search" name="search"  aria-label="Search"></input>
					<button type="submit"  class="bottonericerca" title="button search"><i class="fa fa-search" aria-label="searchButton"></i></button>
					</form>
					</div>
				<div tabindex="0" class="utente utente-menu"><div class="userimage submenutoggler"><img src="./immagini/userdefault.png" alt='profile picture'/></div>
				<ul class="utente-content ilsottomenu">
				<li><a href="account.php">account</a></li>
				<li><a href="php/logout.php">logout</a></li>
				</ul>
				</div>
				</div>
</header>
<p id="error_search"></p>
