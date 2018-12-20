<?php 
/*INIZIO PHP HOME*/
include("connessionedb.php");
function homeprint(){
		global $DB;
	$scifi="SCI-FI";
	echo"<div class='tagmedias'>
			<h2>SCI-FI</h2>
			<ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>
	<button type='button' class='scroll left' title='scroll left'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right'>&gt;
</button>
	</div>";
	$scifi="Action";
	echo"<div class='tagmedias'>
		<h2>Action</h2>
			<ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>	<button type='button' class='scroll left' title='scroll left'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right'>&gt;
</button></div>";
	$scifi="Drama";
	echo"<div class='tagmedias'>
		<h2>Drama</h2>
			<ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>	<button type='button' class='scroll left' title='scroll left'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right'>&gt;
</button></div>";
	$scifi="Comedy";
	echo"<div class='tagmedias'>
		<h2>Comedy</h2>
			<ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>	<button type='button' class='scroll left' title='scroll left'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right'>&gt;
</button></div>";
	$DB->close();
};
/*printstars*/
function checkstars($int){
		while($int){
		echo "<span class='fa fa-star checked'></span>";
							$int--;
		};
};
function stars($int){
		while($int){
		echo "<span class='fa fa-star'></span>";
		$int--;};
};

function infomedia($val){
		global $DB;
		$media="SELECT title,yearrelease,poster,ftime,rating,source,plot FROM `movies` where idM='".$val."'";
		$result=$DB->query($media);
		if($result->num_rows>0){
		$row = mysqli_fetch_assoc($result);
			$rat=$row["rating"];
			$norat=5-$row["rating"];
	echo"<h1 title='title movie' class='mm'>".$row["title"]."</h1><h1 title='rating movie' class='mm'>";
	checkstars($rat);stars($norat);
	echo"</h1> 
	<h1 title='year of release' class='mm'>".$row["yearrelease"]."</h1>  
	<h1 title='duration movie' class='mm'>".$row["ftime"]."</h1>
	</div>
	<video class='mediavideo' poster='./immagini/copertina/".rawurlencode($row["poster"])."' title='Movie video' controls >
	  <source src='./video/".rawurlencode($row["source"]).".mp4' type='video/mp4'/>
	   Your browser does not support the video tag.
	</video>
			<div class='plot'>
			<h3 title='movie plot'>";
			echo"".$row["plot"]."
			 </h3>
			 </div>";
	};
	};
/*fine printstars*/
function media(){
	if(isset($_GET["m"]))
	$val = $_GET["m"];
	infomedia($val);
};

function scihome($string){
	global $DB;
$sci="SELECT o.idM,o.title,o.poster,o.ftime,o.rating FROM (SELECT idM,title,poster,ftime,rating FROM `movies` WHERE tag COLLATE UTF8_GENERAL_CI LIKE '%".$string."%' LIMIT 5)AS o LEFT JOIN (SELECT idM,title,poster,ftime,rating FROM ( SELECT * FROM `userlists` WHERE uemail='user@user.com')as user JOIN `movies`  ON ufilm=idM where tag COLLATE UTF8_GENERAL_CI LIKE '%".$string."%' LIMIT 5)as op ON o.idM=op.idM where op.idM IS NULL LIMIT 5";
$mysci="SELECT idM,title,poster,ftime,rating FROM ( SELECT * FROM `userlists` WHERE uemail='user@user.com')as user JOIN `movies`  ON ufilm=idM where tag COLLATE UTF8_GENERAL_CI LIKE '%".$string."%' LIMIT 5;";
 $myresult=$DB->query($mysci);
 $result=$DB->query($sci);
 $resnum=$result->num_rows;
  if($myresult->num_rows>0)
  {
	  $resnum=5-$myresult->num_rows;
		while($row=$myresult->fetch_assoc()){
			$rat=$row["rating"];
			$norat=5-$row["rating"];
			echo "
<li class='media currentItem'>
			<a href='media.php?m=".$row["idM"]."' title='".rawurlencode($row["title"])."'><img class='copertina' src='./immagini/copertina/".rawurlencode($row["poster"])."' alt='poster of ".$row["title"]."'/> </a> 
<div class='info'>
				<span class='titolo' title='".$row["title"]."'>".$row["title"]."</span>
		<footer class='mediafooter'>
					<span class='durata' title='lenght'>".$row["ftime"]."</span>
						<div class='rating' title='rating'>";
						checkstars($rat);
						stars($norat);
					echo"</div>
		<div class='buttons'>
		<form action='./php/removefromlist.php' method='post'>
		<input type='hidden' name='valueB' value='".$row["idM"]."' />
		<button type='submit' class='aggiungi' title='remove movie from my list'>-</button>
		</form>
		</div>
	</footer>
</div>
</li>
";
	};
  };
	while($resnum>0 && $row1=$result->fetch_assoc()){
			$rat=$row1["rating"];
			$norat=5-$row1["rating"];
			echo "
<li class='media currentItem'>
			<a href='media.php?m=".$row1["idM"]."' title='".rawurlencode($row1["title"])."'><img class='copertina' src='./immagini/copertina/".rawurlencode($row1["poster"])."' alt='poster of ".$row1["title"]."'/> </a> 
<div class='info'>
				<span class='titolo' title='".$row1["title"]."'>".$row1["title"]."</span>
		<footer class='mediafooter'>
					<span class='durata' title='lenght'>".$row1["ftime"]."</span>
						<div class='rating' title='rating'>";
						checkstars($rat);
						stars($norat);
					echo"</div>
		<div class='buttons'>
		<form action='./php/addtolist.php' method='post'>
		<input type='hidden' name='valueB' value='".$row1["idM"]."' />
		<button type='submit' class='aggiungi' title='add movie to my list'>+</button>
		</form></div>
	</footer>
</div>
</li>
";
$resnum--;
	};
};
//FINE PHP HOME

function addtolist($adc,$sess){
	global $DB;
	$sql="INSERT INTO userlists (ufilm,uemail) VALUES (?,?)";
	$stmt = mysqli_prepare($DB,$sql);
	$stmt->bind_param("is",$adc,$sess);
	 $user = mysqli_real_escape_string($DB,$stmt);
	if($stmt->execute()===TRUE){
		$_SESSION["succ"]="Movie added to list succesfully";
		header("Location: ../home.php");
	}
	else echo"non va";
};
function removefromlist($adc,$sess){
	global $DB;
	$sql="DELETE FROM userlists WHERE ufilm='".$adc."' AND uemail='".$sess."'";
	$stmt = mysqli_prepare($DB,$sql);
	$stmt->bind_param("is",$adc,$sess);
	 $user = mysqli_real_escape_string($DB,$stmt);
	if($stmt->execute()===TRUE){
		$_SESSION["del"]="Movie removed from list succesfully";
		header("Location: ../home.php");
	}
	else echo"non va";
};
function search(){
	global $DB;
$search=$_GET["search"];
echo "<h2>Search results for: ".$search." </h2>";
if($search)
{
    $arr_cerca = explode(" ", $search);
    $sql="SELECT idM,title,poster,ftime,rating FROM movies WHERE ";
    for ($i=0; $i<count($arr_cerca); $i++)
      {
          if ($i > 0)
          {
              $sql .= " and ";
          }
          $sql .= "((title COLLATE UTF8_GENERAL_CI LIKE '%".$arr_cerca[$i]."%') or (tag COLLATE UTF8_GENERAL_CI LIKE '%".$arr_cerca[$i]."%') or (yearrelease = '".$arr_cerca[$i]."'))";
      }

    $query = mysqli_query($DB,$sql);
    $num_righe = mysqli_num_rows($query);

    if($num_righe==0)
    {
      echo "No result";
    }
    else
    {


			//numero film per pagina
			$x_pag = 15;

			//recupero il numero pagina corrente
			$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

			// Controllo se $pag è valorizzato e se è numerico
			// ...in caso contrario gli assegno valore 1
			if (!$pag || !is_numeric($pag)) $pag = 1;

        // calcolo il numero totale delle pagine
        $all_pages = ceil($num_righe / $x_pag);

        // Calcolo da quale record iniziare
        $first = ($pag - 1) * $x_pag;

        // Recupero i record per la pagina corrente...
        // utilizzando LIMIT per partire da $first e contare fino a $x_pag
        $sql.=("LIMIT $first, $x_pag");
        $query = mysqli_query($DB,$sql);
        $nr = mysqli_num_rows($query);
        if ($nr != 0)
        {
						echo "<div class='tagmedias'>";
							echo "<ul class='listamedia'>";
          while($row=$query->fetch_assoc())
          {
						$rat=$row["rating"];
						$norat=5-$row["rating"];
									echo "<li class='media currentItem'>";
											//	echo "<div id='poster'>";
            									echo "<a href='media.html'><img class='copertina' src='./immagini/copertina/".$row["poster"]."'/></img></a>";
											//	echo "</div>";
												echo "<div class='info'>";
            									echo "<span class='titolo'>".$row["title"]."</span>
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

														</footer>";
												echo "</div>";
									echo "</li>";
          };
						echo "</ul>";
					echo "</div>";


								//stampo le pagine se ci sono
								if ($all_pages > 1){
									echo "<div class='pagine'>";
							if ($pag > 1){
								//pagina indietro
								echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($pag - 1) . "\">";
								echo "<---</a>";
							}
							// ciclo delle pagine
							for ($p=1; $p<=$all_pages; $p++) {
								// pagina corrente
								if ($p == $pag) echo "<span class='corrente'>" . $p . "</span>";
								else {
									// altre pagine
									echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($p) . "\">";
									echo $p . "</a>";
								}
							}


							if ($all_pages > $pag){
								//pagina avanti
								echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($pag + 1) . "\">";
								 echo "---></a>";
							}
							echo "</div>";
						}
        }
        else
        {
          echo "No result";
			}

		}

	}
			else
			{
			  echo "Enter the title or category of a film for the search";
			}
};
?>