<?php
session_start();
if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}
else{
	$name = "WELCOME";
}
	$count=$_SESSION['count'];
	$cart=$_SESSION['Cart'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="src/css/index.css">
	<link rel="stylesheet" type="text/css" href="src/css/user.css">
	<link rel="stylesheet" type="text/css" href="src/css/cart.css">

	

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
			<img src="src/images/cart.svg" alt="Cart" class="info-bar-icon">
			
		</div>
		<div id="count"><?php echo $count; ?></div>
		<div class="search">
			<img src="src/images/search.svg" alt="SEARCH" class="info-bar-icon">
		</div>
	</div>
	<div class="main">
		<?php
			for($i=0;$i<count($cart);$i++){

				$id=$cart[$i]['id'];
				$amt=$cart[$i]['quantity'];
				$str=file_get_contents("src/js/data.json");
				$json=json_decode($str,true);
				$price=0;
				$name="";
				for($j=0;$j<count($json);$j++){
					if($json[$j]['id']==$id){
						$price=$json[$j]['price'];
						$name=$json[$j]['name'];
					}
				}
				echo "
				<div class='row' id='row-$id'>
				<div class='img'>
					<img src='src/images/$id.jpg'>
				</div>
				<div class='info'>
					<h1>$name</h1>

				</div>
				<div class='rate' align='center'>
					<h1>PRICE</h1>
					<h2>$ $price</h2>
				</div>
				<div class='qty'>
					<div class='ctrl-box'>
						<div id='minus-$id' class='minus'>
							<img src='src/images/minus.svg'  id='minus-img-$id' class='qty-ctrl'>
						</div>
						<div id='amount-$id' align='center'>$amt</div>
						<div id='plus-$id' class='plus'>
							<img src='src/images/plus.svg' id='plus-img-$id' class='qty-ctrl'>
						</div>
					</div>
				</div>
			</div>
			";
			}
		?>
		<!-- <div class="row">
			<div class="img">
				<img src="src/images/1.jpg" alt="">
			</div>
			<div class="info">
				<h1>Blue Checked Shirt</h1>
		
			</div>
			<div class="rate" align="center">
				<h1>PRICE</h1>
				<h2>$12</h2>
			</div>
			<div class="qty">
				<div class="ctrl-box">
					<div>
						<img src="src/images/minus.svg" alt="" class="qty-ctrl">
					</div>
					<div id="amount" align="center">1</div>
					<div>
						<img src="src/images/plus.svg" alt="" class="qty-ctrl">
					</div>
				</div>
			</div>
		</div> -->


		
		
	</div>
	<script src="src/js/data.json"></script>
	<script src="src/js/pass.json"></script>

	<script type="text/javascript" src="src/js/cart.js"></script>
	<script type="text/javascript" src="src/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="src/js/lib.js"></script>

</body>
</html>