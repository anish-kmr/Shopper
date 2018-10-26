<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SHOPPER</title>
	<link rel="stylesheet" type="text/css" href="src/css/index.css">

	

</head>
<body>
	<header>
		<div>
			<ul>
				<li class="header-list">SEARCH</li>
				<li class="header-list">HOME</li>
		
				<li class="header-list"><a href="">SHOPPER</a></li>

				<li class="header-list" id="login">LOGIN</li>
				<li class="header-list" id="signup">SIGNUP</li>
			</ul>
		</div>
		
	</header>


	<div class="modal">
		
		<div class="modal-header">
			<h1 class="cross">&times;</h1>
			<h1 class="login-title">LOGIN</h1>
		</div>
		<div class="modal-body">
			<form action="login.php" method="post">
				<div class="form-group">
					<label for="username">
						<img src="src/images/email.svg" alt="" class="icon">
					</label>
					<input type="email" name="email" id="username" placeholder="EMAIL" required>
				</div>

				<div class="form-group">
					<label for="pwd">
						<img src="src/images/lock.svg" alt="" class="icon">
					</label>
					<input type="password" name="pwd" id="pwd" placeholder="PASSWORD" required>
				</div>
				<div class="form-group" align="center">
					<button type="submit" name="submit" class="submit" align="center" id="login-sub"><a id="passed">SUBMIT</a></button>
				</div>


			</form>
		</div>
	</div>


	<div class="modal">
		
		<div class="modal-header">
			<h1 class="cross">&times;</h1>
			<h1 class="login-title">SIGNUP</h1>
		</div>
		<div class="modal-body">
			<form action="store.php" method="post">
				<div class="form-group">
					<label for="username">
						<img src="src/images/user.svg" alt="" class="icon">
					</label>
					<input type="text" name="username" id="username" placeholder="Username" required>
				</div>


				<div class="form-group">
					<label for="email">
						<img src="src/images/email.svg" alt="" class="icon">
					</label>
					<input type="email" name="email" id="email" placeholder="EMAIL" required>
				</div>

				<div class="form-group">
					<label for="pwd">
						<img src="src/images/lock.svg" alt="" class="icon">
					</label>
					<input type="password" id="pwd" name="pwd" placeholder="PASSWORD" required>
				</div>
				<div class="form-group" align="center">
					<button type = "submit" class="submit" align="center" id="login-sub"><a id="passed">SUBMIT</a></button>
				</div>
			</form>
		</div>
	</div>

	<div class="banner">
		
	</div>
	<div class="main">
		<?php
			include "aside.php";
		?>
		<div class="items">
			<div class="display">
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
				<!-- CONTENT FROM DATA.JSON -->
			</div>
		</div>
	</div>

	
	<script src="src/js/data.json"></script>
	<script src="src/js/pass.json"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script type="text/javascript" src="src/js/index.js"></script>
	<script type="text/javascript" src="src/js/lib.js"></script>
</body>
</html>