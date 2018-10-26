<?php

$connection=mysqli_connect("localhost","root","","dsc");

session_start();

$cart=$_SESSION['Cart'];
$count=$_SESSION['count'];
$email=$_SESSION['email'];

$del="delete from cart where email='$email'";

$res=mysqli_query($connection,$del);
if ($res) {
	echo "<script>alert('deleted')</script>";
}
else{
		echo "<script>alert('not deleted')</script>";

}

for ($i=0; $i <count($cart) ; $i++) { 
		$pid=$cart[$i]['id'];
		$qty=$cart[$i]['quantity'];



		$addtocart="insert into cart values ('$email','$pid','$qty')";
		mysqli_query($connection,$addtocart);

	}


header('Location:index.php');
session_unset();
session_destroy();
?>