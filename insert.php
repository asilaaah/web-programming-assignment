<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
if (!empty($username) || !empty($password) || !empty($gender) || !empty($age) || !empty($email)) {
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

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
			 $SELECT = "SELECT email From userdata Where email = ? Limit 1";
			 $INSERT = "INSERT Into userdata (username, password, gender, age, email) values(?, ?, ?, ?, ?)";
			 //Prepare statement
			 $stmt = $conn->prepare($SELECT);
			 $stmt->bind_param("s", $email);
			 $stmt->execute();
			 $stmt->bind_result($email);
			 $stmt->store_result();
			 $rnum = $stmt->num_rows;
			 if ($rnum==0) {
			  $stmt->close();
			  $stmt = $conn->prepare($INSERT);
			  $stmt->bind_param("sssis", $username, $password, $gender, $age, $email);
			  $stmt->execute();
			  echo header("location: index.php");
			 } else {
			  echo "Someone already register using this email";
			 }
			 $stmt->close();
			 $conn->close();
			}
	} else {
	 echo "All field are required";
	 die();
	}
?>
