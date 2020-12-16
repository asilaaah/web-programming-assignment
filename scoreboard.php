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

<title>Scoreboard</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="web.css">

</head>
<body>

<h1><span style="background-color: #ffcc33;"> Scoreboard </h1>

	<!-- Search menu -->
	<div class="search-container">
			<form action="search.php" method="post" style="text-align: center">
			  <select name="searchtype" style="font-size:27px;">
			  <option value="username">Username</option>
			  <option value="gender">Gender</option>
			  <option value="level">Level</option>
			  </select>
			  <input name="searchterm" type="text" style="font-size:25px;">

			  <input type="submit" name="submit" class="btn btn-warning btn-lg" style="font-size:23px;" value="Search">
			  </form>
			<strong><h2><p style="text-align: center"><span style="background-color: #ffcc33;">*Click the table headers to sort the  table accordingly:</h2></strong></p>
	</div>
	
		<div class="container">		
		
            <table id="table">
                <thead>
				<!-- Table header sorting function -->
					<tr>
						<th onclick="w3.sortHTML('table', '.item', 'td:nth-child(1)')">Username</th>
						<th onclick="w3.sortHTML('table', '.item', 'td:nth-child(2)')">Gender</th>
						<th onclick="w3.sortHTML('table', '.item', 'td:nth-child(3)')">Age</th>
						<th onclick="w3.sortHTML('table', '.item', 'td:nth-child(4)')">Level</th>
						<th onclick="w3.sortHTML('table', '.item', 'td:nth-child(5)')">Total Time (minutes)</th>
						<th onclick="w3.sortHTML('table', '.item', 'td:nth-child(6)')">Total Score</th>
					</tr>
                </thead>
                <tbody>
					<?php
					//Get Heroku ClearDB connection information
					$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
					$cleardb_server   = $cleardb_url["host"];
					$cleardb_username = $cleardb_url["user"];
					$cleardb_password = $cleardb_url["pass"];
					$cleardb_db       = substr($cleardb_url["path"],1);

					$active_group = 'default';
					$query_builder = TRUE;

					// Connect to DB
					$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
					  // Check connection
					  if ($conn->connect_error) {
					   die("Connection failed: " . $conn->connect_error);
					  } 
					  $sql = "SELECT username, gender, age, level, time, score FROM userdata";
					  $result = $conn->query($sql);
					  if (!is_null($result) && $result->num_rows > 0) {
					   // output data of each row
					   while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["username"]. "</td><td>" . $row["gender"] . "</td><td>"
					. $row["age"]. "</td><td>" . $row["level"] . "</td><td>" . $row["time"] . "</td><td>" . $row["score"] . "</td></tr>";
					}
					echo "</table>";
					} else { echo "0 results"; }
					$conn->close();
					?>
                </tbody>
            </table>
		</div> 
		
	<br>
	<br>
	<br>

	<!-- Home button -->
	<p style="text-align: center;"><a class="btn btn-warning btn-lg" style="font-size: 21px;" role="button" href="main.html">Home</a></p>
		
		</div>&nbsp;
	</main>
	</header>

	<!-- Footer -->
	<footer class="container text-center font-italic">
	 <hr>
	 Copyright &copy; 2019 UM Software Engineering Club<br>
	 <a href="mailto:umseclub@um.edu.my">umseclub@um.edu.my</a>
	</footer>

	</div>


	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-
	q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/pop
	per.min.js" integrity="sha384-
	UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
	<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap
	.min.js" integrity="sha384-
	JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>

</body>
</html>                            
