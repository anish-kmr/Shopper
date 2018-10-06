let cart;


console.log(cart)
display=()=>{
	let display=document.getElementsByClassName('display')[0];
	let html=``;
	for(let i=0;i<data.length;i++){
		let id = parseInt(data[i].id);
		let price=parseInt(data[i].price);
		let name=data[i].name;
		html+=`
			<div class="item" id="item-${id}">
				<div class="thumb" id="thumb-${id}">
					<img src="src/images/${id}.jpg" id="img-${id}" class="thumb-img" alt="">
				</div>
				<div class="desc" id="desc-${id}">
					<div class="name" id="name-${id}">${name}</div>
					<div class="price" id="price-${id}">$${price}</div>
				</div>
				<div class="add" id="add-${id}">
					<img src="src/images/cart.svg" id="cart-${id}" alt="" class="cart">
				</div>
			</div>
			`
	}
	display.innerHTML+=html;
}
addEvent=()=>{
	let items=document.getElementsByClassName('item');
	for (let i =0;i<items.length;i++){
		console.log(items[i]);
		items[i].addEventListener('click', push);
	}
}

let  per=JSON.parse(localStorage.getItem(localStorage.uname));
let name=localStorage.uname;
if("cart" in per){
	cart=per.cart;
	console.log("if")
}
else{
	per.cart=[];
	cart=per.cart;

}


push=(event)=>{
	let count_value;
	let count=document.getElementById('count');
	count_value=parseInt(count.innerHTML);
	count_value++;
	per.count=count_value;
	localStorage.setItem(name,JSON.stringify(per))
	/*for(let key=0;key<per.length;key++){
		if(key=="count"){
			per.count=count_value;
		}
		else if(key==per.length-1){
			per.count=count_value;
		}
	}*/
	count.innerHTML=count_value;

	let id=event.target.id;
	id=id.slice(id.length-1, id.length);
	console.log(id);
	let flag=1;
	


	for(let i=0;i<cart.length;i++){
		console.log(i," :  ",cart[i].id)
		if (cart[i].id==id){
			cart[i].quantity+=1;
			flag=0;
			break;
		}
	}
	if(flag==1) {
		cart.push({"id":""+id,"quantity":1})
		
	}
	per.cart=cart;
	localStorage.setItem(name, JSON.stringify(per))
console.log(per)

}




