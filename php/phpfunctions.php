<?php
ob_start();

/************manage session*************/

/*******controllo sessione per accedere al sito o per non accedere ad altre pagine ****/
function sessionPage(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	if(!isset($_SESSION["user"])){//se non c'è la sessione ti tiporto a login.php
		 header("location:login.php");
	}
}
function sessionadmin(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}

	if($_SESSION["admin"] == NULL)
	{
			 header("location:login.php");
	}
}
function sessionLogin(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	if(isset($_SESSION["user"]))
	{//se  c'è la sessione ti tiporto a Home.php
		 header("location:home.php");
	};
}
function sessionSign(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	if(isset($_SESSION["user"]))
	{//se  c'è la sessione ti tiporto a Home.php
		 header("location:Welcome.php");
	};
}

function checkAd(){
	ob_start();
						print($_SESSION["admin"]);
						$output = ob_get_clean();
						$admin=$output;
						if($admin!= NULL){
							 echo "	<a href='adminMovies.php'>manage site</a>";
						}
}
/***************print stars*********************/

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

/************ add & remove list  ************/
function add(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	if (isset($_POST['submitADD']))
	{
		if (isset($_POST["valueB"]))
		{
			$val=$_POST["valueB"];
			if(isset($_SESSION["user"]))
			{
				$sess="".$_SESSION["user"]."";
				addtolist($val,$sess);
			}
		}
	}
}

function remove(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	if (isset($_POST['submitREMOVE']))
	{
		if (isset($_POST["valueB"]))
		{
			$val=$_POST["valueB"];

			if(isset($_SESSION["user"]))
			{
				$sess="".$_SESSION["user"]."";

				removefromlist($val,$sess);
			}
		}
	}

}

function addtolist($adc,$sess){

	require_once("classDB.php");

	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}

	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();

	if ($dbOpen==True)
	{
		$dbAccess->mylistADD($adc,$sess);
	header("Refresh:0");
	}
	else
	{
		 echo "<p>Error during connection</p>";
	}
}

function removefromlist($adc,$sess){

	require_once("classDB.php");

	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}

	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();

	if ($dbOpen==True)
	{


		$dbAccess->mylistREMOVE($adc,$sess);
header("Refresh:0");	}
	else
	{
		 echo "<p>Error during connection</p>";
	}
}
/************** Function Login ****************/
function logi()
{

		require_once("classDB.php");

		if (session_status() == PHP_SESSION_NONE)
		{
				session_start();
		}


		$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
		$dbOpen = $dbAccess->openDBConnection();

		if ($dbOpen==True)
		{
			//interagisci DB
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{

				$username=mysqli_real_escape_string($dbAccess->connection(),$_POST["username"]);
				$pass=mysqli_real_escape_string($dbAccess->connection(),$_POST["pass"]);

				$result= $dbAccess->login($username,$pass);
				$count = mysqli_num_rows($result);
				if($count == 1 && ($username!="" && $pass!=""))
				{//controllo che il risultato della query sia di un solo elemento

					 $_SESSION["user"] = $username;
					 $temp=$result->fetch_assoc();
					 $_SESSION["admin"] = $temp["adminsta"];
					 mysqli_close($dbAccess->$connection);
					 header("location:home.php");
				}
				else
				{
					 	 echo  "Your Username or Password is invalid";
				}
			 }
		}
		else
		{
			 echo "<p>Error during connection</p>";
		}
}

/***************home print*************/
function homeprint(){
	$scifi="SCI-FI";
	echo"<div class='tagmedias'><h2>Sci-fi</h2><ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>
	<button type='button' class='scroll left' title='scroll left SCI-FI Movies'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right SCI-FI Movies'>&gt;
</button>
	</div>";
	$scifi="Action";
	echo"<div class='tagmedias'>
		<h2>Action</h2>
			<ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>	<button type='button' class='scroll left' title='scroll left on Action Movies'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right on Action Movies'>&gt;
</button></div>";
	$scifi="Drama";
	echo"<div class='tagmedias'>
		<h2>Drama</h2>
			<ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>	<button type='button' class='scroll left' title='scroll left on Drama Movies'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right on Drama Movies'>&gt;
</button></div>";
	$scifi="Comedy";
	echo"<div class='tagmedias'>
		<h2>Comedy</h2>
			<ul class='listamedia'>";
	scihome($scifi);
	echo"</ul>	<button type='button' class='scroll left' title='scroll left Comedy Movies'>&lt;
</button>
<button type='button' class='scroll right' title='scroll right Comedy Movies'>&gt;
</button></div>";
};
/**************** scihome *****************/
function scihome($string){
	require_once("classDB.php");

	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();
	if ($dbOpen==True)
	{
		//interagisci DB
		ob_start();
		print($_SESSION["user"]);
		$output = ob_get_clean();
			$user=$output;
		$sqlResult=$dbAccess->home($user,$string);
		$myresult=$sqlResult[1];
		$result=$sqlResult[0];
		$resnum=mysqli_num_rows($result);

		 if($myresult->num_rows>0)
		 {
			 $resnum=5-$myresult->num_rows;
			 while($row=$myresult->fetch_assoc()){
				 $rat=$row["rating"];
				 $norat=5-$row["rating"];
				 echo "
	 <li class='media currentItem'>
				 <a href='media.php?m=".rawurlencode($row["idM"])."' title='".$row["title"]."'><img class='copertina' src='./immagini/copertina/".$row["poster"]."' alt='".$row["title"]." cover'/> </a>
	 <div class='info'>
					 <span class='titolo'>".$row["title"]."</span>
			 <footer class='mediafooter'>
						 <span class='durata'>".$row["ftime"]."</span>
							 <div class='rating'>";
							checkstars($rat);stars($norat);
						 echo"</div>
			 <div class='buttons'>
			 		<form  action='". $_SERVER['PHP_SELF'] ."' method='post'>
			 		<input type='hidden' name='valueB' value='".$row["idM"]."' />
			 		<button type='submit' name='submitREMOVE' class='aggiungi' title='remove ".$row["title"]." from my list'>-</button>
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
							 <a href='media.php?m=".rawurlencode($row1["idM"])."' title='".$row1["title"]."'><img class='copertina' src='./immagini/copertina/".$row1["poster"]."' alt='".$row1["title"]." cover'/> </a>
								 <div class='info'>
								 <span class='titolo'>".$row1["title"]."</span>
								 <footer class='mediafooter'>
									 <span class='durata'>".$row1["ftime"]."</span>
							 <div class='rating'>";
							 checkstars($rat);stars($norat);
						 echo"</div>
			 <div class='buttons'>
			 		<form action='". $_SERVER['PHP_SELF'] ."' method='post'>
			 		<input type='hidden' name='valueB' value='".$row1["idM"]."' />
			 		<button type='submit' name='submitADD' class='aggiungi' title='add ".$row1["title"]." from "."$string"." to my list'>+</button>
			 		</form>
			 </div>
		 </footer>
	 </div>
	 </li>
	 ";
	 $resnum--;
		 };


	}
	else
	{
		 echo "<p>Error during connection</p>";
	}
}

/*****************Media Page********************/
function infomedia($val){

	require_once("classDB.php");

  if (session_status() == PHP_SESSION_NONE)
  {
 		 session_start();
  }

  $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
  $dbOpen = $dbAccess->openDBConnection();

  if ($dbOpen==True)
  {
					$result=$dbAccess->mediaDB($val);
					if($result->num_rows>0)
					{
						$row = mysqli_fetch_assoc($result);
						$rat=$row["rating"];
						$norat=5-$row["rating"];
						echo"<h1 title='title movie' class='mm'>".$row["title"]."</h1><div title='rating movie' class='mm mr'>";
				checkstars($rat);stars($norat);
				echo"</div> 
				<h1 title='year of release' class='mm'>".$row["yearrelease"]."</h1>  
				<h1 title='duration movie' class='mm'>".$row["ftime"]."</h1>
				</div>
				<video class='mediavideo' poster='./immagini/copertina/".rawurlencode($row["poster"])."' title='Movie video' controls >
				  <source src='./video/".rawurlencode($row["source"]).".mp4' type='video/mp4'/>
				  <source src='./video/".rawurlencode($row["source"]).".webm' type='video/webm'/>
				   Your browser does not support the video tag.
				</video>
						<div class='plot'>
						<h3 title='movie plot'>";
						echo"".$row["plot"]."
						 </h3>
						 ";
				}
	else{ 
		echo"<h1>error 404: movie not found</h1>";
	};
  }
  else
  {
 		echo "<p>Error during connection</p>";
  }
};

function media(){
	if(isset($_GET["m"])){
	$val = $_GET["m"];
	infomedia($val);
	}
	else
		echo"<h1 title='error 404'>Error 404:Movie not found</h1>";
};
/************** Function Search ****************/

function search()
{
	require_once("classDB.php");
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}

	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();

	if ($dbOpen==True)
	{
		//interagisci DB
		$user=$_SESSION["user"];
		//numero film per pagina
		$x_pag = 8;
		//recupero il numero pagina corrente
		$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

		// Controllo se $pag è valorizzato e se è numerico
		// ...in caso contrario gli assegno valore 1
		if (!$pag || !is_numeric($pag)) $pag = 1;

		// Calcolo da quale record iniziare
		$first = ($pag - 1) * $x_pag;
		$search;

		if (isset($_GET['search']))
		{
			$search=$_GET["search"];
			echo "<h2>Search results for: ".$search." </h2>";

			if($search)
			{
				$result=$dbAccess->searchDB($search,$first,$x_pag,$user);

				$QSearch =$result[0];

				$QSearch_num_righe = mysqli_num_rows($QSearch);

				// calcolo il numero totale delle pagine
				$all_pages = ceil( ( $QSearch_num_righe)  / $x_pag);


				$QSearch = $result[1];
				$QSearch_num_righe = mysqli_num_rows($QSearch);

				if($QSearch_num_righe==0)
				{
					echo "<p>No result</p>";
				}
				else
				{
					echo "<ul class='listamedia'>";
					while($row=$QSearch->fetch_assoc())
					{
							if($row["mylist"]!=NULL)
							{
								$rat=$row["rating"];
								$norat=5-$row["rating"];
								echo "
											<li class='media currentItem'>
											<a href='media.php?m=".rawurlencode($row["idM"])."' title='".$row["title"]."'>
											<img class='copertina' src='./immagini/copertina/".$row["poster"]."' alt='cover of the film'/> </a>
									 			<div class='info'>
													<span class='titolo'>".$row["title"]."</span>
													<footer class='mediafooter'>
														<span class='durata'>".$row["ftime"]."</span>
														<div class='rating'>";
															checkstars($rat);stars($norat);
											echo"</div>
														<div class='buttons'>
															<form  action=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($pag) . "\" method='post'>
																<input type='hidden' name='valueB' value='".$row["idM"]."' />
																<button type='submit' name='submitREMOVE' class='aggiungi' title='remove ".$row["title"]." from my list' >-</button>
																</form>
														</div>
												</footer>
						 				</div>
						 			</li>";
					 		}//	if($row["mylist"]!=NULL)
					 		else
							{
						 		$rat=$row["rating"];
						 		$norat=5-$row["rating"];
					echo "<li class='media currentItem'>
									<a href='media.php?m=".rawurlencode($row["idM"])."' title='".$row["title"]."'>
									<img class='copertina' src='./immagini/copertina/".$row["poster"]."' alt='cover of the film'/> </a>
									<div class='info'>
										<span class='titolo'>".$row["title"]."</span>
										<footer class='mediafooter'>
											<span class='durata'>".$row["ftime"]."</span>
									 		<div class='rating'>";
									 			checkstars($rat);stars($norat);
								echo"</div>
					 					<div class='buttons'>
						 					<form action=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($pag) . "\" method='post'>
										 		<input type='hidden'   name='valueB' value='".$row["idM"]."' />
										 		<button type='submit' name='submitADD'  class='aggiungi' title='add ".$row["title"]." to my list'>+</button>
						 					</form>
					 					</div>
				 					</footer>
								</div>
							</li>";
					 	}
					}//while
					echo "</ul>";
				}

										//stampo le pagine se ci sono
										if ($all_pages > 1){
											echo "<div class='pagine'>";
									if ($pag > 1){
										//pagina indietro
										echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($pag - 1) . "\" title='previous page'>";
										echo "&#9664</a>";
									}
									// ciclo delle pagine
									for ($p=1; $p<=$all_pages; $p++) {
										// pagina corrente
										if ($p == $pag) echo "<span class='corrente'>" . $p . "</span>";
										else {
											// altre pagine
											echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($p) . "\" title='current page'>";
											echo $p . "</a>";
										}
									}
									if ($all_pages > $pag){
										//pagina avanti
										echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?search=" . ($search) . "&pag=" . ($pag + 1) . "\" title='next page'>";
										 echo "&#9654</a>";
									}
									echo "</div>";
								}
				}//if($search)
				else
				{
						echo "<p class='errore'>Enter the title or category of a film for the search</p>";
				}
		}//if (isset($_GET['search']))
		else
		{
				echo "<h2>Search results for:  </h2>";
				echo "<p class='errore'>Enter the title or category of a film for the search</p>";
		}


	}//if ($dbOpen==True)
	else
	{
		echo "<p>Error during connection</p>";
	}
}


/************** Function Last release ****************/

function LatestReleases()
{
	require_once("classDB.php");
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}

	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();

	if ($dbOpen==True)
	{
		//interagisci DB
		$user=$_SESSION["user"];
		//numero film per pagina
		$x_pag = 8;
		//recupero il numero pagina corrente
		$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

		// Controllo se $pag è valorizzato e se è numerico
		// ...in caso contrario gli assegno valore 1
		if (!$pag || !is_numeric($pag)) $pag = 1;

		// Calcolo da quale record iniziare
		$first = ($pag - 1) * $x_pag;


				$result=$dbAccess->LastMovies($first,$x_pag,$user);

				$QSearch =$result[0];

				$QSearch_num_righe = mysqli_num_rows($QSearch);

				// calcolo il numero totale delle pagine
				$all_pages = ceil( ( $QSearch_num_righe)  / $x_pag);


				$QSearch = $result[1];
				$QSearch_num_righe = mysqli_num_rows($QSearch);

				if($QSearch_num_righe==0)
				{
					echo "<p>No results</p>";
				}
				else
				{
					echo "<ul class='listamedia'>";
					while($row=$QSearch->fetch_assoc())
					{
							if($row["mylist"]!=NULL)
							{
								$rat=$row["rating"];
								$norat=5-$row["rating"];
								echo "
											<li class='media currentItem'>
												<a href='media.php?m=".rawurlencode($row["idM"])."' title='".$row["title"]."'>
												<img class='copertina' src='./immagini/copertina/".$row["poster"]."'  alt='cover of the film'/> </a>
									 			<div class='info'>
													<span class='titolo'>".$row["title"]."</span>
													<footer class='mediafooter'>
														<span class='durata'>".$row["ftime"]."</span>
														<div class='rating'>";
															checkstars($rat);stars($norat);
											echo"</div>
														<div class='buttons'>
															<form  action=\"" . $_SERVER['PHP_SELF'] ."?pag=" . ($pag) . "\" method='post'>
																<input type='hidden' name='valueB' value='".$row["idM"]."' />
																<button type='submit' name='submitREMOVE' class='aggiungi' arial-label='ciao' title='remove ".$row["title"]." from my list' >-</button>
																</form>
														</div>
												</footer>
						 				</div>
						 			</li>";
					 		}//	if($row["mylist"]!=NULL)
					 		else
							{
						 		$rat=$row["rating"];
						 		$norat=5-$row["rating"];
					echo "<li class='media currentItem'>
									<a href='media.php?m=".rawurlencode($row["idM"])."' title='".$row["title"]."'>
									<img class='copertina' src='./immagini/copertina/".$row["poster"]."'  alt='cover of the film'/> </a>
									<div class='info'>
										<span class='titolo'>".$row["title"]."</span>
										<footer class='mediafooter'>
											<span class='durata'>".$row["ftime"]."</span>
									 		<div class='rating'>";
									 			checkstars($rat);stars($norat);
								echo"</div>
					 					<div class='buttons'>
						 					<form action=\"" . $_SERVER['PHP_SELF'] ."?pag=" . ($pag) . "\" method='post'>
										 		<input type='hidden' name='valueB' value='".$row["idM"]."' />
										 		<button type='submit' name='submitADD' class='aggiungi' title='add ".$row["title"]." to my list'>+</button>
						 					</form>
					 					</div>
				 					</footer>
								</div>
							</li>";
					 	}
					}//while
					echo "</ul>";
				}

										//stampo le pagine se ci sono
										if ($all_pages > 1){
											echo "<div class='pagine'>";
									if ($pag > 1){
										//pagina indietro
										echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?pag=" . ($pag - 1) . "\"title='previous page'>";
										echo "&#9664</a>";
									}
									// ciclo delle pagine
									for ($p=1; $p<=$all_pages; $p++) {
										// pagina corrente
										if ($p == $pag) echo "<span class='corrente'>" . $p . "</span>";
										else {
											// altre pagine
											echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?pag=" . ($p) . "\" title='current page'>";
											echo $p . "</a>";
										}
									}
									if ($all_pages > $pag){
										//pagina avanti
										echo "<a href=\"" . $_SERVER['PHP_SELF'] ."?pag=" . ($pag + 1) . "\" title='next page'>";
										 echo "&#9654</a>";
									}
									echo "</div>";
								}
	}//if ($dbOpen==True)
	else
	{
		echo "<p>Error during connection</p>";
	}
}


/*******************Function Reg ********************/
function reg()
{
	require_once("classDB.php");

  if (session_status() == PHP_SESSION_NONE)
  {
 		 session_start();
  }

  $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
  $dbOpen = $dbAccess->openDBConnection();

  if ($dbOpen==True)
  {

		$email="";
		$username="";

		if(isset($_POST["create"]))
		{
		$name=$_POST['name'];
		$surname= $_POST['surname'];
		$username=$_POST['username'];
		$email= $_POST['email'];
		$password= $_POST['pass'];
		$pass2= $_POST['confpass'];

if(empty($name) || empty($surname) || empty($email) || empty($password))
{echo"<p class='erroreSign'>some fields is empty</p>";}
else
{
	if($password!=$pass2){
		echo "<p class='erroreSign'>password does not match<p>";
	}
	else
	{
		
		$result_check = $dbAccess->checkUser($username,$email);
		$user = mysqli_fetch_assoc($result_check);

		if ($user) 
		{ // if user exists
		    if ($user['username'] === $username) 
			{
						 echo "<p class='erroreSign'>username already exists</p>";

		    } 
			else
			{
				if ($user['email'] === $email) 
				{
					echo "<p class='erroreSign'>email already exists</p>";
				}
				
			}

		}
		else
				{
					$result = $dbAccess-> insertUser($name,$surname,$username,$email,$password);
					$_SESSION['user'] = $username;
					$_SESSION['admin'] ="";
					$_SESSION['success'] = "You are now logged in";
					header('location: Welcome.php');
				}
	}
}	
	
		}

  }
  else
  {
			echo "<p>Error during connection</p>";
  }



}; 

/****************user profile****************/

 function profileUser()
{
	require_once("classDB.php");

	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}

	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();

	if ($dbOpen==True)
	{
		$username=$_SESSION['user'];
		$result =$dbAccess->userProfile($username);

		while($r=mysqli_fetch_array($result))
       {
       $username=$r[1];
       $name=$r[3];
       $surname=$r[4];
       $email=$r[5];
       $password=$r[6];
       return $r;
       }

	}
	else
	{
			echo "<p>Error during connection</p>";
	}
}
/*************** Update Profile *****************/
function  update()
	{	require_once("classDB.php");

		if (session_status() == PHP_SESSION_NONE)
		{
				session_start();
		}
		$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
		$dbOpen = $dbAccess->openDBConnection();

		if ($dbOpen==True){
	$row=profileUser();

	$username= $_POST["username"];

	$name= $_POST["name"];
	$surname= $_POST["surname"];
	$password= $_POST["pass"];
	$email= $_POST["email"];

	if(!$username){$username=$row["username"];}
	if(!$name){$name=$row["name"];}
	if(!$surname){$surname=$row["surname"];}
	if(!$email){$email=$row["email"];}
	if(!$password){$password=$row["password"];}
	$temp=$row["username"];
	$dbAccess->updateUser($name,$surname,$username,$email,$password,$temp);
			$_SESSION['user'] = $username;
		header('location: account.php');
	}else {
			echo "<p>Error during connection</p>";
	}
	}

/***************MY list ******************/
function mylist(){

		require_once("classDB.php");

		if (session_status() == PHP_SESSION_NONE)
		{
				session_start();
		}

		$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
		$dbOpen = $dbAccess->openDBConnection();

		if ($dbOpen==True)
		{
			//interagisci DB
			$username=$_SESSION['user'];
			$result=$dbAccess->mylistMovies($username);
			$resnum=$result->num_rows;

				if($resnum!=0)
				{
					echo "<ul class='listamedia'>";
					while($row=$result->fetch_assoc())
					{

						$rat=$row["rating"];
						$norat=5-$row["rating"];
						echo "
						 <li class='media currentItem'>
									<a href='media.php?m=".rawurlencode($row["idM"])."' title='".$row["title"]."'><img class='copertina' src='./immagini/copertina/".$row["poster"]."'/> </a>
						 <div class='info'>
										<span class='titolo'>".$row["title"]."</span>
								<footer class='mediafooter'>
											<span class='durata'>".$row["ftime"]."</span>
												<div class='rating'>";
								checkstars($rat);stars($norat);
								echo"</div>
					<div class='buttons'>
					<form  action=\"" . $_SERVER['PHP_SELF'] ."\" method='post'>
					<input type='hidden' name='valueB' value='".$row["idM"]."' />
					<button type='submit' name='submitREMOVE' class='aggiungi' title='remove ".$row["title"]." from my list'>-</button>
						</form>
					</div>
				</footer>
			 </div>
			 </li>
			 ";
					}
					echo "</ul>";
				}
				else
				{
					echo "<h1>Your list is empty</h1>";
				}
		 		
			}
		else
		{
			echo "<p>Error during connection</p>";
		}

	}


/************** Function Insert movies ****************/

function adminInsertMovie()
{
 require_once("classDB.php");

 if (session_status() == PHP_SESSION_NONE)
 {
		 session_start();
 }

 $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
 $dbOpen = $dbAccess->openDBConnection();

 if ($dbOpen==True)
 {
	 if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$target_dir = "./immagini/copertina/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$title=mysqli_real_escape_string($dbAccess->connection(),$_POST["title"]);
			//$poster=mysqli_real_escape_string($dbAccess->connection(),$_POST["poster"]);
			$year=$_POST["year"];
			$ftime=$_POST["ftime"];
			$lang=mysqli_real_escape_string($dbAccess->connection(),$_POST["lang"]);
			$plot= mysqli_real_escape_string($dbAccess->connection(),$_POST["plot"]);
			$tag=mysqli_real_escape_string($dbAccess->connection(),$_POST["tag"]);
			$rating=$_POST["rating"];

			if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {
				$message = "formt image not allowed";
 				echo "<script type='text/javascript'>alert('$message');</script>";
				$uploadOk = 0;
			}

			if(	$uploadOk != 0 && $title!="" && $_FILES["fileToUpload"]["name"]!="" && $year!="" && $ftime!="" && $lang!="" && $plot!="" && $tag!="" &&  $rating!="")
			{
				if($dbAccess->InsertMovie($title,$_FILES["fileToUpload"]["name"],$year,$ftime,$lang,$plot,$tag,$rating,$target_file)==true)
				{
						move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
				}
			}
			else
			{
				echo "<p class='errore'>Some fields are empty</p>";
			}
	  }
 }
 else
 {
			echo "<p>Error during connection</p>";
 }
}

/************** Function for manage movies ****************/
function removeMovie(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	if (isset($_POST['submitREMOVEmovie']))
	{
		if (isset($_POST["valueID"]))
		{
			$val=$_POST["valueID"];

			if(isset($_SESSION["admin"]))
			{
			deleteMovie	($val);
			}
		}
	}

}
function removeUser(){
	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}
	if (isset($_POST['submitREMOVEuser']))
	{
		if (isset($_POST["valueIDuser"]))
		{
			$val=$_POST["valueIDuser"];

			if(isset($_SESSION["admin"]))
			{
			Userdelete($val);
			}
		}
	}

}
 function adminlist()
{
	require_once("classDB.php");

	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}

	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();

	if ($dbOpen==True)
	{
		//interagisci DB
		echo "<ul>
				<li>title</li>
				<li>year</li>
				</ul>
			";
			$result;
			if(isset($_GET["searchAdmin"])){
				$result=$dbAccess->searchDBadmin($_GET["searchAdmin"]);
			}
			else {
					$result=$dbAccess->listMovies();
			}
			if(mysqli_num_rows($result)>0)
			{
					while($row=$result->fetch_assoc())
					{
						echo "<ul>";
						echo "<li><p title='".$row["title"]."'>";
							echo $row["title"];
						echo "</p></li>";

						echo "<li><p title='".$row["yearrelease"]."'>";
							echo $row["yearrelease"];
						echo "</p></li>";

						echo "<li>";
							echo "	<a href='updateM.php?id=" . ($row['idM']) . "'>M</a>";
						echo "</li>";

						echo "<li>";
						echo "<form  action=\"" . $_SERVER['PHP_SELF'] ."\" method='post'>
									<input type='hidden' name='valueID' value='".$row["idM"]."' />
									<button type='submit' name='submitREMOVEmovie' class='adminButton' title='remove ".$row["title"]." from my list'>X</button>
										</form>";
						echo "</li>";
						echo "</ul>";

					}
		}
		else
		{
			echo "<p class='errore'>No result</p>";
		}

	}
	else
	{
			echo "<p>Error during connection</p>";
	}
}

function printMovie()
{
 require_once("classDB.php");

 if (session_status() == PHP_SESSION_NONE)
 {
		 session_start();
 }

 $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
 $dbOpen = $dbAccess->openDBConnection();

 if ($dbOpen==True)
 {

		 $idFilm=$_GET["id"];
		 $result=$dbAccess->movie($idFilm);
		 $movie=$result->fetch_assoc();
		 echo "
		 <form name='InsertM' action='updateM.php?id=" . ($idFilm) . "' method='post' enctype='multipart/form-data' onsubmit='return UpdateAdminValidation()'>
			 <div class='container'>
		 <label for='title' >Title</label><p><input type='text' value='$movie[title]' placeholder='title of film' id='title' name='title'/>
		 <span id='error_title' class='errore'></span></p>

		 <input type='hidden' name='poster' value='$movie[poster]'/>

		 <label for='fileToUpload' >Poster (optional)</label><p><input type='file' alt='upload image'  name='fileToUpload' id='fileToUpload' />
		 <span id='error_poster' class='errore'></span></p>

		 <label for='year' >Year Release</label><p><input type='text' value='$movie[yearrelease]'  placeholder='enter the year' id='year' name='year' />
		 <span id='error_year' class='errore'></span></p>

		 <label for='ftime' >Duration film</label><p><input type='text' value='$movie[ftime]' placeholder='duratio in the format HH:MM:SS' id='ftime' name='ftime' />
		 <span id='error_time' class='errore'></span></p>

		 <label for='lang' >Language</label><p><input type='text' value='$movie[lang]' placeholder='Language in the format EN' id='lang' name='lang' />
		 <span id='error_lang' class='errore'></span></p>

		 <label for='rating' >Rating</label><p><input  type='number' min='1' max='5' value='$movie[rating]' placeholder='number between 1 and 5' id='rating' name='rating' />
		 <span id='error_rating' class='errore'></span></p>

		 <label for='tag' >Categories</label><p><input type='text' value='$movie[tag]' placeholder='Insert categories divided by a comma' id='tag' name='tag' />
		 <span id='error_tag' class='errore'></span></p>

		 <label for='source' >source</label><p><input type='text' value='$movie[source]' placeholder='Enter Password' id='source' name='source' />
		 <span id='error_source' class='errore'></span></p>

		 <label for='plot' >Plot</label><p><textarea  placeholder='plot of the film' id='plot' name='plot' >$movie[plot]</textarea>
		 <span id='error_plot' class='errore'></span></p>

		 <button type='submit'>Update</button>

		 </div>
	 </form>";
 }
 else
 {
			echo "<p>Error during connection</p>";
 }
}

function updateMovie()
{
 require_once("classDB.php");

 if (session_status() == PHP_SESSION_NONE)
 {
		 session_start();
 }

 $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
 $dbOpen = $dbAccess->openDBConnection();

 if ($dbOpen==True)
 {
	  $idFilm=$_GET["id"];
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if($_FILES["fileToUpload"]["name"]=="")
			{
				$_FILES["fileToUpload"]["name"]=$_POST["poster"];
			}
			$target_dir = "./immagini/copertina/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$title=mysqli_real_escape_string($dbAccess->connection(),$_POST["title"]);
			//$poster=mysqli_real_escape_string($dbAccess->connection(),$_POST["poster"]);
			$year=$_POST["year"];
			$ftime=$_POST["ftime"];
			$lang=mysqli_real_escape_string($dbAccess->connection(),$_POST["lang"]);
			$plot= mysqli_real_escape_string($dbAccess->connection(),$_POST["plot"]);
			$source=mysqli_real_escape_string($dbAccess->connection(),$_POST["source"]);
			$tag=mysqli_real_escape_string($dbAccess->connection(),$_POST["tag"]);
			$rating=$_POST["rating"];

			if($imageFileType != "jpg" && $imageFileType != "jpeg" ) {
				$message = "formt image not allowed";
				echo "<script type='text/javascript'>alert('$message');</script>";
				$uploadOk = 0;
			}

			if($uploadOk != 0 && $title!="" && $_FILES["fileToUpload"]["name"]!="" && $year!="" && $ftime!="" && $lang!="" && $plot!="" && $tag!="" &&  $rating!="")
			{
				if($dbAccess->UpMovie($title,$_FILES["fileToUpload"]["name"],$year,$ftime,$lang,$plot,$tag,$source,$rating,$idFilm))
				{
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
				}

				header("Refresh:0");
			}
			else
			{
				echo "<p class='errore'>Some fields are empty</p>";
			}
	  }
 }
 else
 {
			echo "<p>Error during connection</p>";
 }
}

 function deleteMovie($id)
{
	require_once("classDB.php");

	if (session_status() == PHP_SESSION_NONE)
	{
			session_start();
	}

	$dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
	$dbOpen = $dbAccess->openDBConnection();

	if ($dbOpen==True)
	{
		$tmp=$dbAccess->mediaDB($id);
		$row=$tmp->fetch_assoc();
		$dir="./immagini/copertina/";
		$file=$dir.$row["poster"];
			if (is_file($file) &&(file_exists($file))) //se la news in questiona è "unica"
				{
					unlink($file);
				$dbAccess->deleteFilm($id);
				};
			
	}
	else
	{
			echo "<p>Error during connection</p>";
	}
}
/******************Admn users*********************/
function listUser()
{
 require_once("classDB.php");

 if (session_status() == PHP_SESSION_NONE)
 {
		 session_start();
 }

 $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
 $dbOpen = $dbAccess->openDBConnection();

 if ($dbOpen==True)
 {
	 //interagisci DB
	 echo "	<ul>
			 		<li>username</li>
			 		<li>email</li>
			 		</ul>
		 			";
		$result;
	 	if(isset($_GET["searchAdmin"]))
		{
	 		$result=$dbAccess->searchDBadminU($_GET["searchAdmin"]);
	 	}
	 	else
		{
	 			$result=$dbAccess->allUsers();
		}

	 	if(mysqli_num_rows($result)>0)
	 	{
	 		while($row=$result->fetch_assoc())
	 		{
			 	echo "<ul>";
			 	echo "<li> <p title='".$row["username"]."'>";
				echo $row["username"];
			 	echo "</p></li>";

			 	echo "<li> <p title='".$row["email"]."'>";
				echo $row["email"];
			 	echo "</p></li>";

			 echo "<li>";
			 echo "<form action=\"" . $_SERVER['PHP_SELF'] ."\" method='post'>
						 <input type='hidden' name='valueIDuser' value='".$row["username"]."' />
						 <button type='submit' name='submitREMOVEuser' class='adminButton' title='removeMovie ".$row["username"]."'>X</button>
						 </form>";
			 echo "</li>";

			 echo "</ul>";

			}
	}
	else
	{
	echo "<p class='errore'>No result</p>";
	}

	}
	else
	{
			echo "<p>Error during connection</p>";
	}
}

/**************delete user from admin**************/
function Userdelete($id)
{
 require_once("classDB.php");

 if (session_status() == PHP_SESSION_NONE)
 {
		 session_start();
 }

 $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
 $dbOpen = $dbAccess->openDBConnection();

 if ($dbOpen==True)
 {

		 $dbAccess->deleteUsers($id);
		 header("Refresh:0");
 }
 else
 {
		echo "<p>Error during connection</p>";
 }
}
/**************delete user from account************/
function UserdeleteAccount($id)
{
 require_once("classDB.php");

 if (session_status() == PHP_SESSION_NONE)
 {
		 session_start();
 }

 $dbAccess = new DBAccess(); //creato nuovo oggetto per interagire con il database
 $dbOpen = $dbAccess->openDBConnection();

 if ($dbOpen==True)
 {

		 $dbAccess->deleteUsers($id);
		 session_destroy();
		 header("Location:deletemex.php");
 }
 else
 {
		echo "<p>Error during connection</p>";
 }
}
ob_start();
?>
