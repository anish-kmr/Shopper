<?php

$connection=mysqli_connect("localhost","root","","dsc");

session_start();
if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
	$email=$_SESSION['email'];
}
else{
	echo "WELCOME";
}
$count=0;
$cart=array();
$query="select pid,quantity from cart where email='$email'";
$res=mysqli_query($connection,$query);
if(mysqli_num_rows($res)>0){
	while($row=mysqli_fetch_assoc($res)){
		$pid=$row['pid'];
		$quantity=$row['quantity'];
		array_push($cart,array("id"=>$pid,'quantity' => $quantity));
		$count+=$quantity;
	}
}

$_SESSION['Cart']=$cart;
$_SESSION['count']=$count;

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="src/css/index.css">
	<link rel="stylesheet" type="text/css" href="src/css/user.css">

	

</head>
<body>
	<header>
		<?php
			include "header.php";
		?>
		<h1 id="welcome">
		<?php
			echo $name;
		?>
		</h1>
		
	</header>


	

	<div class="info-bar">
		<div class="cart">
			<a href="usercart.php">
				<img src="src/images/cart.svg" alt="Cart" class="info-bar-icon">
			</a>
		</div>
		<div id="count"><?php echo $count; ?></div>
		<div class="search">
			<img src="src/images/search.svg" alt="SEARCH" class="info-bar-icon">
		</div>
	</div>
	<div class="main">
		<?php
			include "aside.php"
		?>
		<div class="items">
			<div class="display">
				<!-- CONTENT FROM DATA.JSON -->
				<?php
					$loc=file_get_contents("src/js/data.json");
					$product=json_decode($loc,true);
					for($i=0;$i<count($product);$i++){
		  				$id = $product[$i]['id'];
						$price=$product[$i]['price'];
						$name=$product[$i]['name'];

						echo "
			<div class='item' id='item-$id'>
				<div class='thumb' id='thumb-$id'>
					<img src='src/images/$id.jpg' id='img-$id' class='thumb-img'>
				</div>
				<div class='desc' id='desc-$id'>
					<div class='name' id='name-$id'>$name</div>
					<div class='price' id='price-$id'>$$price</div>
				</div>
				<div class='add' id='add-$id'>
					<img src='src/images/cart.svg' id='cart-$id' class='cart'>
				</div>
			</div>
			";
	}				
				?>
			</div>
		</div>
	</div>
	<script src="src/js/data.json"></script>
	<script src="src/js/pass.json"></script>

	<script type="text/javascript" src="src/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="src/js/user.js"></script>
	<script type="text/javascript" src="src/js/lib.js"></script>

</body>
</html>