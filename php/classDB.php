<?php

class DBAccess
{
	const HOST_DB = 'localhost';
	const USERNAME = 'root';
	const PASSWORD = '';
	const DATABASE_NAME = 'netmovies';

	public $connection;

/************connect DB***************/
	public function openDBConnection()
	{
		$this->connection= mysqli_connect(static::HOST_DB, static::USERNAME,static::PASSWORD, static::DATABASE_NAME);

		if (!$this->connection){
			return false;
			}
		else{
			return true;
			}
		}
		function connection()
		{
			return $this->connection;
		}
/************movies Home*************/
		public function home($user,$string)
		{
			$sci="SELECT o.idM,o.title,o.poster,o.ftime,o.rating
			 			FROM (
									SELECT idM,title,poster,ftime,rating
									FROM `movies`
									WHERE tag COLLATE UTF8_GENERAL_CI LIKE '%".$string."%' order by idM DESC LIMIT 5
								 )
								 AS o LEFT JOIN (
																	SELECT idM,title,poster,ftime,rating
																	FROM (
																				SELECT *
																				FROM `userlists`
																				WHERE user='".$user."'
																			 )
																			 as user JOIN `movies`  ON ufilm=idM where tag  COLLATE UTF8_GENERAL_CI LIKE '%".$string."%' order by idM DESC LIMIT 5
																	)
																	as op ON o.idM=op.idM where op.idM IS NULL ORDER BY o.idM DESC LIMIT 5 ";

				$mysci="SELECT* FROM (SELECT idM,title,poster,yearrelease,ftime,lang,rating,plot,tag,source FROM movies,userlists WHERE idM=ufilm AND user='".$user."' and tag COLLATE UTF8_GENERAL_CI LIKE '%".$string."%' ORDER BY idM DESC LIMIT 5)as t join (SELECT * FROM movies WHERE tag COLLATE UTF8_GENERAL_CI LIKE '%".$string."%' ORDER BY idM DESC LIMIT 5 )as lista where t.idM=lista.idM";
				$result = mysqli_query($this->connection,$sci);
				$result2 = mysqli_query($this->connection,$mysci);

				return array($result,$result2);

		}
/******************user's list******************/
		public function mylistMovies($user)
			{

					$sql = "SELECT idM,title,poster,ftime,rating FROM ( SELECT * FROM `userlists` WHERE user='$user')as user JOIN `movies`  ON ufilm=idM ;";
					$result = mysqli_query($this->connection,$sql);
					return $result;

			}

/****************media page****************/
		public function mediaDB($id)
		{
					$sql="SELECT title,yearrelease,poster,ftime,rating,source,plot FROM `movies` where idM='".$id."'";
					$result = mysqli_query($this->connection,$sql);
						return $result;
		}
/***********add to my list***************/
		public function mylistADD($id,$sess)
		{
			$sql="INSERT INTO userlists (ufilm,user) VALUES ('$id','$sess')";

			if(mysqli_query($this->connection,$sql)==TRUE){
				$_SESSION["succ"]="Movie added to list succesfully";

			}
			else echo"non va";
		}

/***********remove from my list***************/
		public function mylistREMOVE($id,$sess)
		{
			$sql="DELETE FROM userlists WHERE ufilm='".$id."' AND user='".$sess."'";

			if(mysqli_query($this->connection,$sql)==TRUE){
				$_SESSION["del"]="Movie removed from list succesfully";

			}
			else echo"non va";
		}
/***********LOGIN***************/
		public function login($username,$pass)
		{

				$sql = "SELECT username,adminsta FROM users WHERE username = '$username' and password = '$pass'";

				$result = mysqli_query($this->connection,$sql);

					return $result;

		}
/************Search query*****************/
		public function searchDB($search,$first,$x_pag,$user)
		{
			$arr_cerca = explode(" ", $search);


	    $SQLSearch="SELECT op.idM as mylist,o.idM,o.title,o.poster,o.ftime,o.rating FROM (
						SELECT idM,title,poster,ftime,rating FROM movies WHERE " ;
	    for ($i=0; $i<count($arr_cerca); $i++)
	      {
	          if ($i > 0)
	          {
	              $SQLSearch .= " AND ";
	          }
	          $SQLSearch .= "((title  COLLATE UTF8_GENERAL_CI LIKE '%".$arr_cerca[$i]."%') or (tag  COLLATE UTF8_GENERAL_CI  LIKE '%".$arr_cerca[$i]."%') or (yearrelease = '".$arr_cerca[$i]."'))";
	      }
				  $SQLSearch .= ")
										AS o LEFT JOIN (
													 SELECT idM,title,poster,ftime,rating
													 FROM (
																 SELECT *
																 FROM userlists
																 WHERE user='$user'
															 ) as user JOIN movies  ON ufilm=idM where ";
																for ($i=0; $i<count($arr_cerca); $i++)
																	{
																			if ($i > 0)
																			{
																					$SQLSearch .= " AND ";
																			}
																			$SQLSearch .= "((title  COLLATE UTF8_GENERAL_CI LIKE '%".$arr_cerca[$i]."%') or (tag  COLLATE UTF8_GENERAL_CI  LIKE '%".$arr_cerca[$i]."%') or (yearrelease = '".$arr_cerca[$i]."'))";
																	}

																		$SQLSearch .= ") as op ON o.idM=op.idM order by o.idM DESC";


						$QSearch = mysqli_query($this->connection,$SQLSearch);
			 			$SQLSearch .= " LIMIT $first,$x_pag";

			 			$QSearch2 = mysqli_query($this->connection,$SQLSearch);
						return array($QSearch,$QSearch2);
		}

		/************Last Movie query*****************/
				public function LastMovies($first,$x_pag,$user)
				{

			    $SQLSearch="SELECT op.idM as mylist,o.idM,o.title,o.poster,o.ftime,o.rating FROM
											(
													SELECT idM,title,poster,ftime,rating FROM movies
			      					)
												AS o LEFT JOIN (
																				 SELECT idM,title,poster,ftime,rating
																				 FROM (
																							 SELECT *
																							 FROM userlists
																							 WHERE user='$user'
																						 ) as user JOIN movies  ON ufilm=idM
																			 ) as op ON o.idM=op.idM
																			 		ORDER BY idM DESC";


								$QSearch = mysqli_query($this->connection,$SQLSearch);
					 			$SQLSearch .= " LIMIT $first,$x_pag";

					 			$QSearch2 = mysqli_query($this->connection,$SQLSearch);
								return array($QSearch,$QSearch2);
				}
		/*******Seacrh for admin Movie**********/
		public function searchDBadmin($search)
		{
			$arr_cerca = explode(" ", $search);
	    $sql="SELECT idM,title,yearrelease FROM movies WHERE ";
	    for ($i=0; $i<count($arr_cerca); $i++)
	      {
	          if ($i > 0)
	          {
	              $sql .= " AND ";
	          }
						$sql .= "((title  COLLATE UTF8_GENERAL_CI LIKE '%".$arr_cerca[$i]."%') or (tag  COLLATE UTF8_GENERAL_CI  LIKE '%".$arr_cerca[$i]."%') or (yearrelease = '".$arr_cerca[$i]."'))";
	      }

	 		 	$result = mysqli_query($this->connection,$sql);

	 		 	return $result;
		}

		/*******Seacrh for admin User**********/
		public function searchDBadminU($search)
		{
			$arr_cerca = explode(" ", $search);
			$sql="SELECT username,email FROM users WHERE ";
			for ($i=0; $i<count($arr_cerca); $i++)
				{
						if ($i > 0)
						{
								$sql .= " AND ";
						}
						$sql .= "((username  COLLATE UTF8_GENERAL_CI LIKE '%".$arr_cerca[$i]."%') or (email  COLLATE UTF8_GENERAL_CI  LIKE '%".$arr_cerca[$i]."%'))";
				}

				$result = mysqli_query($this->connection,$sql);

				return $result;
		}

/*************list movies for admin*************/
		public function listMovies()
		{

				$sql = "SELECT idM,title,poster,yearrelease,ftime,lang,rating,tag FROM movies ";

				$result = mysqli_query($this->connection,$sql);

				return $result;

		}

		/***********insert mvie for admin*************/
				public function InsertMovie($title,$poster,$year,$ftime,$lang,$plot,$tag,$rating)
				{

						$sql = "INSERT INTO movies(title,poster,yearrelease,ftime,lang,rating,plot,tag)
						 				VALUES  ('$title','$poster','$year','$ftime','$lang','$rating','$plot','$tag')";

						 if(mysqli_query($this->connection,$sql)==TRUE)
						 {
							 echo "Movie insert succesfully";
							 return true;

						 }
						 else {
							 echo "Movie not insert  succesfully";
							 	return false;
						 }

				}
/*************print movie for update by admin*************/
		public function movie($id)
		{

				$sql = "SELECT title,poster,yearrelease,ftime,lang,rating,plot,tag,source FROM movies WHERE idM='$id'";

				$result = mysqli_query($this->connection,$sql);

				return $result;

		}

/*************delete movie for admin*************/
		public function deleteFilm($idFilm)
		{
			$sql = "DELETE FROM movies WHERE idM=$idFilm ";
			if(mysqli_query($this->connection,$sql)==TRUE)
			{
				header("Refresh:0");
				$message = "film deleted";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else {
				$message = "film not deleted";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}


		}
/***********Insert user**********/
		public function insertUser($name,$surname,$username,$email,$password)
		{
			$sql = "INSERT INTO users (name,surname,username, email, password)
						VALUES('$name', '$surname', '$username', '$email', '$password')";

			$result = mysqli_query($this->connection,$sql);
			return $result;
		}
/************Update user for edit**************/
public function updateUser($name,$surname,$username,$email,$password,$temp){
	$sql="UPDATE users SET username='$username',name='$name',surname='$surname', password='$password', email='$email' WHERE  username='$temp'";
	$result=mysqli_query($this->connection,$sql);
	return $result;
}
/***********check user before insert**********/
		public function checkUser($username,$email)
		{
			$sql="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

			$result = mysqli_query($this->connection,$sql);
			return $result;
		}


		/********Update movie for admin**************/
		public function UpMovie($title,$poster,$year,$ftime,$lang,$plot,$tag,$source,$rating,$id)
		{

				$sql = "UPDATE movies
								SET title='$title',poster='$poster',yearrelease='$year',ftime='$ftime',lang='$lang',rating='$rating',plot='$plot',tag='$tag',source='$source'
				 				WHERE  idM='$id'";

				 if(mysqli_query($this->connection,$sql)==TRUE)
				 {
	 				$message = "Movie successfully updated";
	 				echo "<script type='text/javascript'>alert('$message');</script>";
					return true;
	 			}
	 			else {
	 				$message = "Movie not updated";
	 				echo "<script type='text/javascript'>alert('$message');</script>";
					return false;
	 			}


		}
		/**************all users for admin***************/
		public function allUsers()
		{
			$sql="SELECT * FROM users where adminsta is NULL";
			$result = mysqli_query($this->connection,$sql);
			return $result;
		}
		/*************query for print user profile**************/
		public function userProfile($username)
		{
			$sql="SELECT * FROM users where username='$username'";
			$result = mysqli_query($this->connection,$sql);
			return $result;
		}
			/*************delete users**************/
		public function deleteUsers($username)
		{
					$query = "DELETE FROM users WHERE username='$username'";
					$result = mysqli_query($this->connection, $query);
					return $result;
		}
}//classe
?>
