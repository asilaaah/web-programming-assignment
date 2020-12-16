<?php
session_start();

//Get Heroku ClearDB connection information
$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);

$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

$username = $_POST['username'];
$password = $_POST['password'];

$s = "select * from userdata where username = '$username' && password = '$password'";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    header('location: level.php');
}else{
    echo "<script type='text/javascript'>alert('Wrong Username or Password!');
	window.location='index.php';
	</script>";
}
?>
