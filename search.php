<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
<meta charset="utf-8">
<script src="https://www.w3schools.com/lib/w3.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstr
ap.min.css" integrity="sha384-
ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Results</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="web.css">

</head>
<body>
  <h1><span style="background-color: #ffcc33;"> Search Results </h1>
  
<br>
<br>
<div class="bg-color" style="font-size:27px; color:black;">
	<div class="container">	
	<?php
		// create short variable names
		$searchtype=$_POST['searchtype'];
		$searchterm="%{$_POST['searchterm']}%";

		if (!$searchtype || !$searchterm) {
		   echo '<p>You have not entered search details.<br/>
		   Please go back and try again.</p>';
		   exit;
		}

		// whitelist the searchtype
		switch ($searchtype) {
		  case 'username':
		  case 'gender':
		  case 'level':   
			break;
		  default: 
			echo '<p>That is not a valid search type. <br/>
			Please go back and try again.</p>';
			exit; 
		}

		// set up for using PDO
		$user = 'root';
		$pass = '';
		$host = '127.0.0.1';
		$db_name = 'mysql';

		// set up DSN
		$dsn = "mysql:host=$host;dbname=$db_name";

		// connect to database
		try {
		  $db = new PDO($dsn, $user, $pass); 

		  //Prepared Statements in PDO - prepare, bind, execute
		  // perform query
		  $query = "SELECT username, gender, age, level, time, score  FROM userdata WHERE $searchtype like :searchterm";  
		  $stmt = $db->prepare($query);  
		  $stmt->bindParam(':searchterm', $searchterm);
		  $stmt->execute(); 

		  // get number of returned rows  
		  echo "<p><b>Results found: ".$stmt->rowCount()."</b></p><br>"; 

		  // display each returned row
		  while($result = $stmt->fetch(PDO::FETCH_OBJ)) {                                                       
			echo "<p>Username: ".$result->username."</strong>";                               
			echo "<br />Gender: ".$result->gender;                                              
			echo "<br />Age: ".$result->age;  
			echo "<br />Level: ".$result->level;                                              
			echo "<br />Total time (minutes): ".$result->time; 		
			echo "<br />Total score: ".$result->score."</p><br>";                                         
		  }         

		  // disconnect from database
		  $db = NULL;
		} catch (PDOException $e) {
		  echo "Error: ".$e->getMessage();
		  exit;
		}
	  ?>
	</div>
</div>
<br>
<br>
<br>

  	<!-- Scoreboard button -->
	<p style="text-align: center;"><a class="btn btn-warning btn-lg" style="font-size: 21px;" role="button" href="scoreboard.php">Scoreboard</a></p>

	<!-- Footer -->
	<footer class="container text-center font-italic">
	 <hr>
	 Copyright &copy; 2019 UM Software Engineering Club<br>
	 <a href="mailto:umseclub@um.edu.my">umseclub@um.edu.my</a>
	</footer>

</body>
</html>