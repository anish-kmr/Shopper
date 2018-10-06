window.addEventListener('load',()=>{
	let  per=JSON.parse(localStorage.getItem(localStorage.uname));
	let name=localStorage.uname;
	console.log(name)
	document.getElementById('welcome').innerHTML+=name;

	if("count" in per){
		document.getElementById('count').innerHTML=per.count;
	}


	display();

	addEvent();
	
	let home=document.getElementsByClassName("header-list")[2];
	home.addEventListener('click', ()=>{
		alert("Login again and then Logout to prevent Data Loss");
	})

	let logout=document.getElementById('logout');
	logout.addEventListener('click', ()=>{
		localStorage.removeItem("uname");
		window.location.href="index.html";
	})


}) 