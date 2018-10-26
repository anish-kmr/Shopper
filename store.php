<?php
$connection=mysqli_connect("localhost","root","","dsc");
if ($connection) {
	echo "connection successful <br>";
}
else{
	echo "connection error";
}
$uname=$_REQUEST['username'];
$email=$_REQUEST['email'];
$pwd=$_REQUEST['pwd'];

echo "$uname<br>$email<br>$pwd";

$insert="insert into user values('$uname','$email','$pwd')";
mysqli_query($connection,$insert);
// if(mysqli_query($connection,$insert)){
// 	echo "INSERTED";
// }
// else{
// 	echo "not inserted";
// }



?>