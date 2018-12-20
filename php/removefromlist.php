<?php 
include("../php/connessionedb.php");
require_once("../php/phpfunctions.php");
session_start();
if (isset($_POST["valueB"])) {
	$val=$_POST["valueB"];
	if(isset($_SESSION["user"])){
		$sess="".$_SESSION["user"]."";
	removefromlist($val,$sess);
	};
};
?>