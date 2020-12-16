<?php
session_start();

$con = mysqli_connect('ec2-174-129-199-54.compute-1.amazonaws.com', 'kkckoswvozqflu', 'a5d495701a3ec1d185624aabd9084093c41165a950818ab406afa8f07f9876f3');
mysqli_select_db($con, 'd1jn4cpvnijl45');

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
