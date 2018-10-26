<?php

$connection=mysqli_connect("localhost","root","","dsc");

session_start();

$id=$_POST['id'];
$email=$_SESSION['email'];
$query="select pid,quantity from cart where email='$email'";
$res=mysqli_query($connection,$query);
$cart=$_SESSION['Cart'];
if ($cart==NULL) {
	$cart=array();
	echo "<br>empty cart initialised";
}

// else{
// 	$cart=$_SESSION['Cart'];
	
// 	echo "mycart is ";
// 	print_r($cart);
// }


if(mysqli_num_rows($res)>0){
	while($row=mysqli_fetch_assoc($res)){
		$pid=$row['pid'];
		$quantity=$row['quantity'];
		array_push($cart,array("id"=>$pid,'quantity' => $quantity));
	}
}

$count=0;
echo "mycart is ";
print_r($cart);

  
echo gettype($cart);

$flag=0;
if(count($cart)>0){
	for ($i=0; $i <count($cart) ; $i++) { 
		if ($cart[$i]['id']==$id) {

			$val=(int)$cart[$i]['quantity']+1;
			$cart[$i]['quantity']=$val;
			$flag=1;

			break;
		}
		
	}
	// foreach ($cart as $key => $value) {
	// 	if($key->id==$id){
	// 		$val=(int)$value+1;
	// 		$value=$val;
	// 		$flag=1;
	// 		break;
	// 	}
	// }
	if($flag==0){
		// $a=json_encode(array('id'=>$id));
		// $cart->$a=1;
		array_push($cart,array("id"=>$id,'quantity' => '1'));
		}
}
else{
	// $a=json_encode(array('id'=>$id));
	// $cart->$a=1;
	array_push($cart,array("id"=>$id,'quantity' => '1'));
}


// for ($i=0; $i <count($cart) ; $i++) { 
// 	$count+=(int)$cart[$i]['quantity'];
// }


$_SESSION['Cart']=$cart;
$_SESSION['count']=$count;

for ($i=0; $i <count($cart) ; $i++) { 
	$count+=(int)$cart[$i]['quantity'];
}
echo "cart from session :";
print_r($_SESSION['Cart']);

echo "<br>";
echo "type of cart is ".gettype($cart);
echo "count :".$count."<br>";
?>