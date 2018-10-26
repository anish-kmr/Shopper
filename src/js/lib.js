let cart;
// display=()=>{
// 	let display=document.getElementsByClassName('display')[0];
// 	let html=``;
// 	for(let i=0;i<data.length;i++){
// 		let id = parseInt(data[i].id);
// 		let price=parseInt(data[i].price);
// 		let name=data[i].name;
// 		html+=`
// 			<div class="item" id="item-${id}">
// 				<div class="thumb" id="thumb-${id}">
// 					<img src="src/images/${id}.jpg" id="img-${id}" class="thumb-img" alt="">
// 				</div>
// 				<div class="desc" id="desc-${id}">
// 					<div class="name" id="name-${id}">${name}</div>
// 					<div class="price" id="price-${id}">$${price}</div>
// 				</div>
// 				<div class="add" id="add-${id}">
// 					<img src="src/images/cart.svg" id="cart-${id}" alt="" class="cart">
// 				</div>
// 			</div>
// 			`
// 	}
// 	display.innerHTML+=html;
// }
addEvent=()=>{
	let items=document.getElementsByClassName('item');
	for (let i =0;i<items.length;i++){
		console.log(items[i]);
		items[i].addEventListener('click', push);
	}
}



push=(event)=>{
	let count_value;
	let count=document.getElementById('count');
	count_value=parseInt(count.innerHTML);
	count_value++;

	count.innerHTML=count_value;

	let id=event.target.id;
	id=id.slice(id.length-1, id.length);

	let flag=1;
	
	$.ajax({
		url: 'cartcookie.php',
		type: 'POST',
		data: {id: id}
	})
	.done(function(data) {
		console.log("success");
		console.log(data);
		
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	// window.location.href="cartcookie.php";
	

	console.log(id);
	

}




