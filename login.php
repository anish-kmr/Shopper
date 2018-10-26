<?php
$connection=mysqli_connect("localhost","root","","dsc");

$email=$_REQUEST['email'];
$pwd=$_REQUEST['pwd'];

$select=mysqli_query($connection,"select * from user");
$name="";

session_start();
	
	if (isset($_REQUEST['email'])) {
		$email=$_REQUEST['email'];
		
		$sel="select username from user where email = '$email'";
		$query=mysqli_query($connection,$sel);
		if (mysqli_num_rows($query)>0) {
			while($row=mysqli_fetch_assoc($query)){
				$name=$row['username'];
			}
		}
		$_SESSION['name']=$name;
		$_SESSION['email']=$email;
		
		echo $_SESSION['name'];
	}

if(mysqli_num_rows($select)>0){
	while($row=mysqli_fetch_assoc($select)){
		if($row['email']==$email && $row['password']==$pwd){

			redirect("userhome.php");
		}
		else{
			echo "Incorrect Email or Password";
		}
	}
}




function redirect($url)
{
   header('Location: ' . $url);
   die();
}
?>