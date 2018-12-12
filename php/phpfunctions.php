<?php 
	require_once("./php/connessionedb.php");
function scihome(){
	global $DB;
$sci="SELECT o.idM,o.title,o.poster,o.ftime,o.rating FROM (SELECT idM,title,poster,ftime,rating FROM `movies` WHERE tag COLLATE UTF8_GENERAL_CI LIKE '%SCI-FI%' LIMIT 5)AS o LEFT JOIN (SELECT idM,title,poster,ftime,rating FROM ( SELECT * FROM `userlists` WHERE uemail='user@user.com')as user JOIN `movies`  ON ufilm=idM where tag COLLATE UTF8_GENERAL_CI LIKE '%SCI-FI%' LIMIT 5)as op ON o.idM=op.idM where op.idM IS NULL LIMIT 5";
$mysci="SELECT idM,title,poster,ftime,rating FROM ( SELECT * FROM `userlists` WHERE uemail='user@user.com')as user JOIN `movies`  ON ufilm=idM where tag COLLATE UTF8_GENERAL_CI LIKE '%SCI-FI%' LIMIT 5;";
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
	while($resnum>0 && $row1=$result->fetch_assoc()){
			$rat=$row1["rating"];
			$norat=5-$row1["rating"];
			echo "
<li class='media currentItem'>
			<a href='media.php?m=".rawurlencode($row1["idM"])."' title='".rawurlencode($row1["title"])."'><img class='copertina' src='./immagini/copertina/".$row1["poster"]."'/> </a> 
<div class='info'>
				<span class='titolo'>".$row1["title"]."</span>
		<footer class='mediafooter'>
					<span class='durata'>".$row1["ftime"]."</span>
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
		<button type='submit' class='aggiungi' formaction='addtolist()' formmethod='POST'>+</button>
		</div>
	</footer>
</div>
</li>
";
$resnum--;
	};
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