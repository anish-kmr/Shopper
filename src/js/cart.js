window.addEventListener('load', ()=>{

	console.log("hello");
	let home=document.getElementsByClassName("header-list")[2];
	home.addEventListener('click', ()=>{
		alert("Login again and then Logout to prevent Data Loss");
	})

	let logout=document.getElementById('logout');
	logout.addEventListener('click', ()=>{
		alert("logged out");
		window.location.href="logout.php";
	})





})


// let AddToCart=()=>{
// 	// let  per=JSON.parse(localStorage.getItem(localStorage.uname));
// 	// let main=document.getElementsByClassName('main')[0];
// 	// let html=``;
// 	// let c=per.cart;
// 	// console.log('c  ; ',c)
// 	// for(let i=0;i<c.length;i++){
// 	// 	let id = parseInt(c[i].id);
// 	// 	let price=0;
// 	// 	let name="";
// 	// 	let amt=c[i].quantity;
// 	// 	for(let j=0;j<data.length;j++){
// 	// 		if(data[j].id==id){
// 	// 			price=data[j].price;
// 	// 			name=data[j].name;
// 	// 		}
// 	// 	}
// 	let mycart = document.cookie;
// 	$.serialize(mycart);
// 	alert(mycart);
// 		html+=`
// 			<div class="row" id="row-${id}">
// 				<div class="img">
// 					<img src="src/images/${id}.jpg" alt="">
// 				</div>
// 				<div class="info">
// 					<h1>${name}</h1>

// 				</div>
// 				<div class="rate" align="center">
// 					<h1>PRICE</h1>
// 					<h2>$${price}</h2>
// 				</div>
// 				<div class="qty">
// 					<div class="ctrl-box">
// 						<div id="minus-${id}" class="minus">
// 							<img src="src/images/minus.svg" alt=""  id="minus-img-${id}" class="qty-ctrl">
// 						</div>
// 						<div id="amount-${id}" align="center">${amt}</div>
// 						<div id="plus-${id}" class="plus">
// 							<img src="src/images/plus.svg" alt="" id="plus-img-${id}" class="qty-ctrl">
// 						</div>
// 					</div>
// 				</div>
// 			</div>
// 			`
// 	// }
// 	main.innerHTML+=html;
// 	addEventP();
// 	addEventM();
// }





addEventP=()=>{
	let plus=document.getElementsByClassName('plus');
	console.log(plus)
	for (let i =0;i<plus.length;i++){
		console.log(plus[i]);
		plus[i].addEventListener('click',add);
	}
}

addEventM=()=>{
	let minus=document.getElementsByClassName('minus');
	console.log(minus)
	for (let i =0;i<minus.length;i++){
		console.log(minus[i]);
		minus[i].addEventListener('click',sub);
	}
}

add=(event)=>{

	let id=event.target.id;
	
	id=id.slice(id.length-1, id.length);
	console.log(id);

	let name=localStorage.uname;
	let  per=JSON.parse(localStorage.getItem(localStorage.uname));
	per.count+=1;

	for(let i = 0;i<per.cart.length;i++){
		if(per.cart[i].id==id){
			per.cart[i].quantity+=1;
			console.log(per)
			break;
		}
	}
	localStorage.setItem(name,JSON.stringify(per))

	let amt=document.getElementById(`amount-${id}`);
	console.log(amt)
	amt_value=parseInt(amt.innerHTML);
	amt_value+=1;
	amt.innerHTML=amt_value;

	document.getElementById('count').innerHTML=per.count;



}



sub=(event)=>{

	let id=event.target.id;
	
	id=id.slice(id.length-1, id.length);

	let name=localStorage.uname;
	let  per=JSON.parse(localStorage.getItem(localStorage.uname));
	if (per.count>1) {
		per.count-=1;
	}
	
	console.log("length",per.cart)
	for(let i = 0;i<per.cart.length;i++){
		if(per.cart[i].id==id){
			if (per.cart[i].quantity>1) {
				per.cart[i].quantity-=1;
				localStorage.setItem(name,JSON.stringify(per))
				break;
			}
			/*else{	
				per=per.cart.splice(i,1)
				localStorage.setItem(name,JSON.stringify(per))
				location.reload();
			}*/
			
		}
	}
	

	let amt=document.getElementById(`amount-${id}`);
	console.log(amt)
	amt_value=parseInt(amt.innerHTML);
	if (amt_value>1) {
		amt_value-=1;
	}
	amt.innerHTML=amt_value;

	document.getElementById('count').innerHTML=per.count;



}


