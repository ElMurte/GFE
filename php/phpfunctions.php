<?php 
	require_once("./php/connessionedb.php");
function scihome(){
	global $DB;
$sci="SELECT idM,title,poster,ftime,rating FROM `movies` WHERE tag COLLATE UTF8_GENERAL_CI LIKE '%SCI-FI%' LIMIT 5;";
$mysci="SELECT idM,title,poster,ftime,rating FROM ( SELECT * FROM `userlists` WHERE uemail='user@user.com')as user JOIN `movies`  ON ufilm=idM LIMIT 5;";
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
			<a href='media.php?m=".rawurlencode($row["idM"])."' title='".rawurlencode($row["title"])."'><img class='copertina' src='./immagini/copertina/".$row["poster"]."'/> </a> 
<div class='info'>
				<span class='titolo'>".$row["title"]."</span>
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
		<button type='submit' class='aggiungi' action=\'./php/removefromolist.php\'>-</button>
		</div>
	</footer>
</div>
</li>
";
	};
  };
	while($resnum>0 && $row=$result->fetch_assoc()){
			$rat=$row["rating"];
			$norat=5-$row["rating"];
			echo "
<li class='media currentItem'>
			<a href='media.php?m=".rawurlencode($row["idM"])."' title='".rawurlencode($row["title"])."'><img class='copertina' src='./immagini/copertina/".$row["poster"]."'/> </a> 
<div class='info'>
				<span class='titolo'>".$row["title"]."</span>
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
		<button type='submit' class='aggiungi' action=\'./php/addtolist.php\'>+</button>
		</div>
	</footer>
</div>
</li>
";
$resnum--;
	};
	$DB->close();
};

function addtolist(){
if (isset($_POST["submit"])) {
							$sql="INSERT INTO userlists (ufilm,uemail) VALUES (?,?)";
							   $stmt = mysqli_prepare($DB,$sql);
							   $user = mysqli_real_escape_string($DB,$stmt);
								$stmt->bind_param("ss",$_POST["ufilm"],$_POST["uemail"]);
								if($stmt->execute()===TRUE){
								$_SESSION["succ"]="Movie added to list succesfully";
									header("Location: ../home.php");
								}
							};
};
function removefromolist(){

};
?>