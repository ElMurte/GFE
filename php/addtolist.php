<?php 
	require_once("connessionedb.php");
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
							
?>