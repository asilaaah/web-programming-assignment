<?php
session_start();

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'mysql');

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
